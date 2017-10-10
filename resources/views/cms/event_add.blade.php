<link  href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
<script src="{{ asset('js/datepicker.js') }}"></script>
<script>
  $('[data-toggle="datepicker"]').datepicker({
    format: 'dd-mm-yyyy'
  });
</script>
<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span style="float: left;">Add an Event</span>
    </div>
    <div class="mws-panel-body">
        <form id="add_form" name="add_form" role="form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="title" placeholder="Title" name="title">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="link" placeholder="Link" name="link">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" data-toggle="datepicker"
                  class="large" id="date" placeholder="Date" name="date">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="time" placeholder="Time e.g. 7:30AM" name="time">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <select id="location" name="location">
                    <option disabled selected value="">choose location</option>
                    <option value="kinyerezi">Kinyerezi</option>
                    <option value="mikocheni">Mikocheni</option>
                </select>
            </div>
            <div class="mws-form-item" style="margin-top: 24px;">
                <textarea id="description" style="width: 100%; min-height: 100px;"
                  name="description" placeholder="Short description"></textarea>
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <span>Upload image</span>
                <input type="file" class="large" id="file" name="file">
            </div>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success" onclick="form_save('event')">save</button>
                <button type="button" class="btn btn-danger" onclick="menu_links('event')">cancel</button>
            </div>
        </form>

    </div>
</div>
