<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span style="float: left;"><i class="icon-video"></i>Edit video details</i></span>
    </div>
    <div class="mws-panel-body">
        <form id="edit_form" name="edit_form" role="form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="hidden" name="id" id="edit_id" value="{{$edit_details['id']}}" />
                <input type="text" class="large" id="title" placeholder="Title" name="title" value="{{$edit_details['title']}}">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="link" placeholder="Youtube url" name="link" value="{{$edit_details['link']}}">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="date" placeholder="Date e.g. 2,june 2016" name="date" value="{{$edit_details['date']}}">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <select id="category" name="category">
                    <option {{(strcasecmp($edit_details['category'], "songs") == 0) ? 'selected="selected"' : ''}} value="songs">Songs</option>
                    <option {{(strcasecmp($edit_details['category'], "stories") == 0) ? 'selected="selected"' : ''}} value="stories">Stories</option>
                    <option {{(strcasecmp($edit_details['category'], "fine_motors") == 0) ? 'selected="selected"' : ''}} value="fine_motors">Fine motors</option>
                    <option {{(strcasecmp($edit_details['category'], "gross_motors") == 0) ? 'selected="selected"' : ''}} value="gross_motors">Gross motors</option>
                </select>
            </div>
            <div class="mws-form-item" style="margin-top: 24px;">
                <textarea id="description" style="width: 100%; min-height: 100px;" name="description" placeholder="Short description">{{$edit_details['description']}}</textarea>
            </div>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success" onclick="save_changes('video')">save</button>
                <button type="button" class="btn btn-danger" onclick="menu_links('video')">cancel</button>
            </div>
        </form>

    </div>
</div>
