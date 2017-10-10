<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span style="float: left;">Edit a Book</span>
    </div>
    <div class="mws-panel-body">
        <form id="edit_form" name="edit_form" role="form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
              <input type="hidden" name="id" id="edit_id"
                value="{{$edit_details->id}}">
                <input type="text" class="large" id="edit_book_title" placeholder="Title" name="title"
                  value="{{$edit_details->title}}">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="edit_book_author" placeholder="Author" name="author"
                  value="{{$edit_details->author}}">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="edit_date_published"
                  placeholder="Date published e.g. June 2016" name="date_published"
                  value="{{$edit_details->date_published}}">
            </div>
            <div class="mws-form-item" style="margin-top: 24px;">
                <textarea id="edit_book_description" style="width: 100%; min-height: 100px;"
                  name="description" placeholder="Short description">{{$edit_details->description}}</textarea>
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <span>Replace cover: </span>
                <input type="file" class="large" id="cover_image" name="cover_image">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <span>Replace book: </span>
                <input type="file" class="large" id="book" name="book_url">
            </div>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success" onclick="save_changes('book')">save</button>
                <button type="button" class="btn btn-danger" onclick="menu_links('book')">cancel</button>
            </div>
        </form>

    </div>
</div>
