<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span style="float: left;">Add a Worksheet</span>
    </div>
    <div class="mws-panel-body">
        <form id="add_form" name="add_form" role="form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="type"
                  placeholder="Worksheet type" name="type">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
              <span>Upload worksheet: </span>
                <input type="file" class="large" id="worksheet"
                  name="worksheet">  
            </div>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success"
                  onclick="form_save('worksheet')">save</button>
                <button type="button" class="btn btn-danger"
                  onclick="menu_links('worksheet')">cancel</button>
            </div>
        </form>
    </div>
</div>
