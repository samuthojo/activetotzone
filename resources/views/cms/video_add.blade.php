<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span style="float: left;"><i class="icon-video"></i>Add a video</i></span>
    </div>
    <div class="mws-panel-body">
        <form id="add_form" name="add_form" role="form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="title" placeholder="Title" name="title">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="link" placeholder="Youtube url" name="link">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="date" placeholder="Date e.g. 2,june 2016" name="date">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <select id="category" name="category">
                    <option value="songs">Songs</option>
                    <option value="stories">Stories</option>
                    <option value="fine_motors">Fine motors</option>
                    <option value="gross_motors">Gross motors</option>
                </select>
            </div>
            <div class="mws-form-item" style="margin-top: 24px;">
                <textarea id="description" style="width: 100%; min-height: 100px;" name="description" placeholder="Short description"></textarea>
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <span>Upload image</span>
                <input type="file" class="large" id="file" name="file">
            </div>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success" onclick="form_save('video')">save</button>
                <button type="button" class="btn btn-danger" onclick="menu_links('video')">cancel</button>
            </div>
        </form>

    </div>
</div>