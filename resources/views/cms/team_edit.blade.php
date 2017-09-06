<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span style="float: left;"><i class="icon-home"></i>Edit details</i></span>
    </div>
    <div class="mws-panel-body">
        <form id="edit_form" name="edit_form" role="form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="hidden" name="edit_id" id="edit_id" value="{{$edit_details['id']}}" />
                <input type="text" class="large" id="name" placeholder="name" name="name" value="{{$edit_details['name']}}">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="position" placeholder="Position" name="position" value="{{$edit_details['position']}}">
            </div>
            <div class="mws-form-item" style="margin-top: 24px;">
                <textarea id="description" style="width: 100%; min-height: 100px;" name="description" placeholder="Short description">{{$edit_details['description']}}</textarea>
            </div>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success" onclick="save_changes('team')">save</button>
                <button type="button" class="btn btn-danger" onclick="menu_links('team')">cancel</button>
            </div>
        </form>

    </div>
</div>
