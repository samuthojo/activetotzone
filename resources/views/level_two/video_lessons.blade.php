@extends('layouts.app')
@section('title', $title)
@section('content')
  <style>
    .ipf-blog{
        width: 100%;
        height: auto;
        display: table;
        background-image: url("{{url('assets/images/banner.jpg')}}");
        padding:40px 5%;
        /*background-size: cover;*/
    }

    .ipf-blog:after{
        position: absolute;
        top:0;
        left:0;
        content: "";
        /*background-color: rgba(58, 83, 155, 0.85);*/
        /*background-color: rgba(239, 72, 54, 0.7);*/
        background-color: rgba(255, 165, 0, 0.81);
        width: 100%;
        height: 100%;
        z-index: 1;
    }
    .ipf-blog >h1{
        margin: 0 auto;
        background-position: center;
        text-align: center;
        font-size: 3em;
        font-family: "Love light", serif;
        color: white;
        z-index: 2;
        float: left;
        width: 100%;
    }
    .blog{
        width: 30.3333%;
        min-height: 650px;
        display: table-cell;
        margin:40px 1.5%;
        background-color: white;
        z-index: 2;
        float: left;

    }
    .blog >img{
        width: 100%;
    }
    .blog .post-date{
        font-size: 0.9em;
        line-height: 2;
        font-family: "Qanelas bold", sans-serif;
        padding:5px 10px;
        text-align: left;
    }
    .blog .post-title{
        font-size: 1.3em;
        padding: 10px 10px 5px;
        text-align: left;
        font-family: "Qanelas Regular", sans-serif;
    }
    .blog .post-summary{
        font-size: 1em;
        padding: 10px;

    }
    .play-btn{
        position: absolute;
        width: 60px;
        height:43px;
        /*background-color: black;*/
        background-image: url("{{url('assets/images/playbtn.png')}}");
        background-size: contain;
        top:30%;
        left:50%;
        transform: translateX(-50%) translateY(-30%);
        display: block;
        z-index: 2;
    }
    @media all and (max-width : 780px) {
        .ipf-blog{
            top:-40px;
        }
        .blog{
            width: 40%;
            min-height: 450px;
            display: table-cell;
            margin:20px ;
            background-color: white;
            z-index: 2;
            float: left;

        }
    }

    @media all and (max-width : 520px) {
        .ipf-blog{
            top:-40px;
        }
        .blog{
            width: 100%;
            min-height: 450px;
            display: table-cell;
            margin:10px auto;
            background-color: white;
            z-index: 2;
            float: left;

        }
    }
</style>

<section class="ipf-blog">

    <h1 > {{$video_cat}} Video  Lessons</h1>

        @if(count($videos) > 0)
            @foreach($videos as $video)
              @php
                  $link = $video['title'];

                  // Remove all characters except A-Z, a-z, 0-9, dots, hyphens and spaces
                  // Note that the hyphen must go last not to be confused with a range (A-Z)
                  // and the dot, being special, is escaped with \
                  $link = preg_replace('/[^A-Za-z0-9\. -]/', '', $link);
                  // Replace sequences of spaces with hyphen
                  $link = preg_replace('/  */', '-',  $link);
                  $link=  preg_replace('/-+/', '-', $link);
                  // You may also want to try this alternative:
                  $link = preg_replace('/\\s+/', '-',  $link);
              @endphp

              {{--Display only top three blogs--}}
        <a href="{{url('watch/'.$video['id'].'/'.$link)}}">
            <div class="blog">
                <span class="play-btn"></span>
                <img src="{{url('uploads/' . $video['image'])}}">
                <h1 class="{{'post-date' . ' ' . (($loop->index % 2) == 1 ? 'brand-blue-color' : 'brand-green-color')}}">{{$video['date']}}</h1>
                <h2 class="post-title">{{$video['title']}}</h2>
                <h3 class="post-summary">{{substr($video['description'],0,250)}}... </h3>
                <h1 class="{{'post-date' . ' ' . (($loop->index % 2) == 1 ? 'brand-blue-color' : 'brand-green-color')}}">watch video</h1>
            </div>
        </a>

    @endforeach
  @endif

</section>
@endsection
