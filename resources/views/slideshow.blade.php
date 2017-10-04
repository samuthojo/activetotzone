<style>
  .my_image {
    padding-bottom: 10px;
  }
</style>
<div class="mws-panel grid_10">
    <div class="mws-panel-header">
        <span style="float: left;">Slide Pictures: </span>
    </div>
    <div class="mws-panel-body">
      <div class="container">
        <div class="row">
          @foreach($slideshows as $slideshow)
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 my_image">
            <img src="{{ asset('uploads/slideshows/thumbs/' . $slideshow->name) }}"
              class="img-rounded" title="{{'slide ' . $loop->iteration}}"
              alt="slide"><br/>
              <span title="picture name">{{$slideshow->name}}</span><br/><br/>
              <label for="{{$slideshow->id}}">Change picture: </label>
              <input type='file' name='slideshow' id='{{$slideshow->id}}'>
          </div>
          @endforeach
        </div>
      </div>
    </div>
</div>
