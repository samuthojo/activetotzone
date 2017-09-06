<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span style="float: left;">Add a team member</span>
    </div>
    <div class="mws-panel-body">
        <form id="add_form" name="add_form" role="form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="name" placeholder="name" name="name">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="position" placeholder="Position" name="position">
            </div>
            <div class="mws-form-item" style="margin-top: 24px;">
                <textarea id="description" style="width: 100%; min-height: 100px;" name="description" placeholder="Short description"></textarea>
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <span>Upload image</span>
                <input type="file" class="large" id="file" name="file">
            </div>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success" onclick="form_save('team')">save</button>
                <button type="button" class="btn btn-danger" onclick="menu_links('team')">cancel</button>
            </div>
        </form>

    </div>
</div>
