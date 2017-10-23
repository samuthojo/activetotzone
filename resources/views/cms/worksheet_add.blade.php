<script>
  function fetchSubSubjects() {
    subject_id = $('#subject').val();

    var link = 'sheet_sub_subjects/' + subject_id; //fetch all sub_subjects of this subject

  $.getJSON(link)
   .done(function (data) {
     setUpModels(data, 'sub_subject');
   })
   .fail(function ( error ) {
     console.error('Error', error)
   });
  }

  function setUpModels(data, id) {
    var mySelect = document.getElementById(id);

    var length = mySelect.options.length;

    //Leave the first option, delete the rest
    $('#' + id).find('option').not(':first').remove();
    $('#' + id).val('');//select first option

    for(i = 0; i < data.length; i++) {
       var opt = document.createElement("option");
       opt.value= data[i].id;
       opt.innerHTML = data[i].name;

       // then append it to the select element
       mySelect.appendChild(opt);
    }
  }
</script>
<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span style="float: left;">Add a Worksheet</span>
    </div>
    <div class="mws-panel-body">
        <form id="add_form" name="add_form" role="form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="title"
                  placeholder="Worksheet title" name="title">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="price"
                  placeholder="Price" name="price">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <select id="grade" name="work_sheet_grade_id">
                  <option disabled selected value="">Choose Grade</option>
                  @foreach($grades as $grade)
                    <option value="{{$grade->id}}">{{$grade->name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <select id="subject" name="work_sheet_subject_id" onchange='fetchSubSubjects()'>
                  <option disabled selected value="">Choose Subject</option>
                  @foreach($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <select id="sub_subject" name="work_sheet_sub_subject_id">
                  <option disabled selected value="">Choose Sub-Subject</option>
                </select>
            </div>
            <div class="mws-form-item" style="margin-top: 24px;">
                <textarea id="description" style="width: 100%; min-height: 100px;"
                          name="description" placeholder="Short description"></textarea>
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
              <span>Upload worksheet: </span>
                <input type="file" class="large" id="worksheet"
                  name="worksheet">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
              <span>Upload cover page: </span>
                <input type="file" class="large" id="picture"
                  name="picture">
            </div>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success"
                  onclick="form_save('worksheet')">save</button>
                <button type="button" class="btn btn-danger"
                  onclick="menu_links('worksheet')">cancel</button>
            </div>
        </form>
    </div>
</div>
