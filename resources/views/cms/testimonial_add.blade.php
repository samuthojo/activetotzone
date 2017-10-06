<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span style="float: left;">Add a Testimonial</span>
    </div>
    <div class="mws-panel-body">
        <form id="add_form" name="add_form" role="form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="sayer"
                  placeholder="The one who said" name="name">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="relationship"
                  placeholder="Relationship e.g. Ken's Dad" name="relationship">
            </div>
            <div class="mws-form-item" style="margin-top: 24px;">
                <textarea id="testimonial_description" style="width: 100%; min-height: 100px;"
                  name="description" placeholder="What was said"></textarea>
            </div>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success"
                  onclick="form_save('testimonial')">save</button>
                <button type="button" class="btn btn-danger"
                  onclick="menu_links('testimonial')">cancel</button>
            </div>
        </form>
    </div>
</div>
