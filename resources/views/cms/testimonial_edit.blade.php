<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span style="float: left;">Edit Testimonial</span>
    </div>
    <div class="mws-panel-body">
        <form id="edit_form" name="edit_form" role="form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
              <input type="hidden" name="id" id="edit_id"
                value="{{$edit_details->id}}">
                <input type="text" class="large" id="sayer"
                  placeholder="The one who said" name="name"
                  value="{{$edit_details->name}}">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="text" class="large" id="relationship"
                  placeholder="Relationship e.g. Ken's Dad" name="relationship"
                  value="{{$edit_details->relationship}}">
            </div>
            <div class="mws-form-item" style="margin-top: 24px;">
                <textarea id="testimonial_description" style="width: 100%; min-height: 100px;"
                  name="description" placeholder="What was said">{{$edit_details->description}}</textarea>
            </div>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success"
                  onclick="save_changes('testimonial')">save</button>
                <button type="button" class="btn btn-danger"
                  onclick="menu_links('testimonial')">cancel</button>
            </div>
        </form>
    </div>
</div>
