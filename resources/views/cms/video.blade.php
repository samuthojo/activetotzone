<div class="mws-panel grid_10">
    <div class="mws-panel-header">
        <span style="float: left;">Video lessons</span>
        <span onclick="form_add('video')" style="float: right;"><i class="fa fa-plus-circle fa-2x"></i></span>
    </div>
    <div class="mws-panel-body">

      @if(count($video)>0)
          @foreach($video as $details)
            @php
              $id = 'image_closer'.$details['id'];
            @endphp
              <section id="team_details" style="height: 300px; width: 100%; padding-top: 10px;">
                  <div id="{{$details['id']}}" onmouseover="show_video_image_closer(id)" id="farmer_image" style="position: relative; border: solid 3px #d3d3d3; float: left; width: 40%; height: 300px; background-image: url('{{url("uploads/" . $details['image'])}}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                      <i id="{{$id}}" onclick="close_video_image({{$details['id']}})" class="fa fa-times fa-2x closer" style="color: darkred; display: block; position: absolute; left: 45%; bottom: 45%; cursor: pointer;"></i>
                  </div>
                  <div id="team_description" style="border: solid 3px #d3d3d3; float: left; margin-left: 0; height: 300px; width: 40%; position: relative;">
                      <div style="padding: 10px;">
                          <span style="padding-left: 10px;"><b>Title : </b>{{$details['title']}}</span><br>
                          <span style="padding-left: 10px;"><b>Category : </b>{{$details['category']}}</span><br>
                          <span style="padding-left: 10px;"><b>Date : </b>{{$details['date']}}</span><br>
                          <span style="padding-left: 10px;"><b>Link : </b>{{$details['link']}}</span><br><br>
                          <p style="padding-left: 10px;">{{substr($details['description'],0,300) . ' ' . '...'}}</p>
                      </div><br>
                      <div class="btn-group" style="position: absolute; bottom: 0; padding-left: 10px;" >
                          <button class="btn btn-default btn-small" onclick="form_edit('video', {{$details['id']}})">Edit</button>
                          <button class="btn btn-danger btn-small" onclick="form_delete('video', {{$details['id']}})">Delete</button>
                          <!--<button class="btn btn-info btn-small" onclick="video_preview(<?php // $details['id']; ?>)">Preview</button>-->
                      </div>
                  </div>
              </section>
          @endforeach
     @endif
    </div>
</div>
