<style>
  .row{
    display: flex;
    flex-wrap: wrap;
  }

  .col-lg-6{
    width: calc(50% - 20px);
    margin-right: 20px;
    margin-bottom: 40px;
  }

  .col-lg-6 a{
    display: block;
    margin-bottom: -8px;
    height: 300px;
  }

  .col-lg-6 a img{
    height: 100%;
    width: auto;
  }

  .my_image {
    padding-bottom: 10px;
  }
  .mws-panel .mws-panel-body {
    width: 93%;
    display: table;
    height: auto;
  }
  .slide {
    float: left;
  }
</style>
<script>
  function previewFile(id){
      var preview = document.querySelector('.img' + id); //selects the query named img
      var file    = document.querySelector('#file' + id).files[0]; //sames as here
      var reader  = new FileReader();

      var formData =  new FormData();
      formData.append('slideshow', file);
      link = 'cms/slideshows/updateSlide/' + id;

      reader.onloadend = function () {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
            type: 'post',
            dataType: 'html',
            url:  link,
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result){
              $(".ipf-preloader").fadeOut(1000);
              preview.src = reader.result;
            }
          });
      }

      if (file) {
          reader.readAsDataURL(file); //reads the data as a URL
      } else {
          preview.src = "";
      }
 }

 function refresh(id) {
   var file    = document.querySelector('#file' + id).files[0];
   var reader  = new FileReader();

   var formData =  new FormData();
   formData.append('slideshow', file);
   formData.append('id', id);
   link = 'cms/slideshows/create';

   reader.onloadend = function () {
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       $.ajax({
         type: 'post',
         dataType: 'html',
         url:  link,
         data: formData,
         async: false,
         cache: false,
         contentType: false,
         processData: false,
         success: function (result){
           $(".ipf-preloader").fadeOut(1000);
           $("#main_content").html(result);
         }
       });
   }

     if (file) {
         reader.readAsDataURL(file); //reads the data as a URL
     }
 }
</script>
<div class="mws-panel grid_10">
    <div class="mws-panel-header">
        <span style="float: left;">Slide Pictures: </span>
    </div>
    <div class="mws-panel-body">
      <div class="container">
        <div class="row">
            @php
              $size = count($slideshows);
              $isLessThanFour = $size < 4;
            @endphp

            @foreach($slideshows as $slideshow)
              <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
                <a href=
                  "{{ asset('uploads/slideshows/' . $slideshow->slideshow) }}"
                   target="_blank">
                  <img src="{{ asset('uploads/slideshows/thumbs/' . $slideshow->slideshow) }}"
                    class="img-rounded {{'img' . $slideshow->id}}"
                    title="{{'slide ' . $loop->iteration}}"
                    alt="slide">
                </a><br/>
                <span style="font-weight: bold;">Change picture: </span><br/>
                <input type='file' name='slideshow' id="{{'file' . $slideshow->id}}"
                 onchange="previewFile('{{$slideshow->id}}')">
              </div>
            @endforeach

            @if($isLessThanFour)
              @for($i = ($size + 1); $i < 5; $i++)
                <div class='col-lg-6' style="background: #CCCCCC; height: 300px;"
                  title="{{'slide ' . $i}}">
                  <span style="font-weight: bold;">Change picture: </span><br/>
                  <input type='file' name='slideshow'
                    id="{{'file' . $i}}" onchange="refresh('{{$i}}')">
                </div>
              @endfor
            @endif

        </div>
      </div>
    </div>
</div>
