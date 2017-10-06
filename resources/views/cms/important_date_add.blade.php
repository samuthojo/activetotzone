<link  href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
<script src="{{ asset('js/datepicker.js') }}"></script>
<script>
  $('[data-toggle="datepicker"]').datepicker({
    format: 'dd-mm-yyyy'
  });
</script>
<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span style="float: left;">Add an Important Date</span>
    </div>
    <div class="mws-panel-body">
        <form id="add_form" name="add_form" role="form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="important_date"
                  placeholder="Date e.g. 2,june 2016" name="date"
                  data-toggle="datepicker">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="issue"
                  placeholder="The issue" name="issue">
            </div>
            <div class="mws-form-item" style="margin-top: 24px;">
                <textarea id="description" style="width: 100%; min-height: 100px;"
                  name="description" placeholder="Short description"></textarea>
            </div>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success"
                  onclick="form_save('important_date')">save</button>
                <button type="button" class="btn btn-danger"
                  onclick="menu_links('important_date')">cancel</button>
            </div>
        </form>
    </div>
</div>
