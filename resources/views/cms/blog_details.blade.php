<div class="mws-panel grid_10">
    <div class="mws-panel-header">
        <span style="float: left;">Blog details</span>
    </div>
    <div class="mws-panel-body">
        <div class="image_container" id="{{$blog['id']}}" onmouseover="show_blog_image_closer({{$blog['id']}})" style="width:100%; height: 300px; background-image: url('{{url("uploads/" . $blog['image'])}}'); background-size: contain; background-repeat: no-repeat; background-position: center;">
            <i class="fa fa-times-circle fa-2x closer" style="color: darkred; padding-left: 50%; padding-top: 140px; cursor: pointer;" onclick="close_blog_image({{$blog['id']}})"></i>
        </div>
        <div style="margin-top: 10px; width: 100%; text-align: center; height: auto;">{{strtoupper($blog['title'])}}</div><br>
        <div style="margin-top: 10px; width: 100%; text-align: center; height: auto;">{{strtoupper($blog['date'])}}</div><br>
        <div style="margin-top: 10px; width: 100%; text-align: center; height: auto;">{{strtoupper($blog['author'])}}</div><br>
        <div style="position: relative; text-align:left; width: 100%; height: 400px; overflow-y: scroll; margin-top: 5px; padding: 20px; border: solid 3px rgba(169, 169, 169, 0.33); border-radius: 2px;">
            {!! $blog['description'] !!}
        </div><br>
        <div style="width: 40%; height: 60px; position: absolute;bottom: 5px; left: 50px;">
            <button type="button" class="btn btn-default" onclick="form_edit('blog',{{$blog['id']}})"><i class="fa fa-edit"></i></button>
            <button type="button" class="btn btn-danger" onclick="form_delete('blog',{{$blog['id']}})"><i class="fa fa-trash"></i></button>
            <button type="button" class="btn btn-info" onclick="menu_links('blog')"><i class="fa fa-close"></i></button>
        </div>
    </div>

</div>
