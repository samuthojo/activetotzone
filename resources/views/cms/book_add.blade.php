<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span style="float: left;">Add a Book</span>
    </div>
    <div class="mws-panel-body">
        <form id="add_form" name="add_form" role="form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="book_title" placeholder="Title" name="title">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="book_author" placeholder="Author" name="author">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="date_published"
                  placeholder="Date e.g. 2,june 2016" name="date_published">
            </div>
            <div class="mws-form-item" style="margin-top: 24px;">
                <textarea id="book_description" style="width: 100%; min-height: 100px;"
                  name="description" placeholder="Short description"></textarea>
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <span>Cover image: </span>
                <input type="file" class="large" id="cover_image" name="cover_image">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <span>Upload book: </span>
                <input type="file" class="large" id="book" name="book_url">
            </div>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success" onclick="form_save('book')">save</button>
                <button type="button" class="btn btn-danger" onclick="menu_links('book')">cancel</button>
            </div>
        </form>

    </div>
</div>
