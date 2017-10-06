<link  href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
<script src="{{ asset('js/datepicker.js') }}"></script>
<script>
  $('[data-toggle="datepicker"]').datepicker({
    format: 'dd-mm-yyyy'
  });
  $('#location').val('{{$edit_details->location}}');
</script>
<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span style="float: left;">Edit Event</span>
    </div>
    <div class="mws-panel-body">
        <form id="edit_form" name="edit_form" role="form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
              <input type="hidden" name="edit_id" id="edit_id"
                value="{{$edit_details->id}}">
                <input type="text" class="large" id="title" placeholder="Title" name="title"
                 value="{{$edit_details->title}}">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="link" placeholder="Link" name="link"
                 value="{{$edit_details->link}}">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" data-toggle="datepicker"
                 class="large" id="date" placeholder="Date e.g. 2,june 2016" name="date"
                 value="{{Carbon\Carbon::parse($edit_details->date)->format('d-m-Y')}}">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="time" placeholder="Time e.g. 7:30AM" name="time"
                 value="{{$edit_details->time}}">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <select id="location" name="location">
                  <option value="kinyerezi">Kinyerezi</option>
                  <option value="mikocheni">Mikocheni</option>
                </select>
            </div>
            <div class="mws-form-item" style="margin-top: 24px;">
                <textarea id="description" style="width: 100%; min-height: 100px;"
                  name="description" placeholder="Short description">{!! $edit_details->description !!}</textarea>
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <br/>
                <span>Replace existing picture: </span>
                <input type="file" class="large" id="file" name="file">
            </div>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success" onclick="save_changes('event')">save</button>
                <button type="button" class="btn btn-danger" onclick="menu_links('event')">cancel</button>
            </div>
        </form>

    </div>
</div>
