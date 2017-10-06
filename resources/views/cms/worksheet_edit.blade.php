<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span style="float: left;">Edit a WorkSheet</span>
    </div>
    <div class="mws-panel-body">
        <form id="edit_form" name="edit_form" role="form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
              <input type="hidden" name="edit_id" id="edit_id"
                value="{{$edit_details->id}}">
                <input type="text" class="large" id="worksheet"
                  placeholder="Worksheet type" name="type"
                  value="{{$edit_details->type}}">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
              <span>Replace worksheet: </span>
                <input type="file" class="large" id="worksheet"
                  name="worksheet">
            </div>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success"
                  onclick="save_changes('worksheet')">save</button>
                <button type="button" class="btn btn-danger"
                  onclick="menu_links('worksheet')">cancel</button>
            </div>
        </form>
    </div>
</div>
