
<!-- Created by PhpStorm.
User: graysonjulius
Date: 01/08/2016
Time: 7:51 PM -->

@extends('layouts.app')
@section('title', $title)
@section('content')
<style>
    .ipf-read{
        width: 100%;
        height: auto;
        display: table;
        padding: 100px 5%;
        background: #ECF0F1;
    }
    .read{
        height: auto;
        width: 80%;
        margin: 0 auto 50px;
        display: table;
    }
    .read-image{
        width: 100%;
        height: 450px;
        margin: 20px auto;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: left top;
    }
    .read h1{
        font-size: 2em;
        margin-bottom: 10px;
        font-weight: 700;
        color: #254c9e;
    }
    .read h2{
        font-size: 1.2em;
        line-height: 1.3;
        font-weight: 300;
        color: #000;
    }
    .read h2 span{
        /*font-weight: 700;*/
    }
    .read >span{
        font-size: 0.8em;
        color: #555;
        line-height: 1.3;
        font-weight: 500;
    }
    .share-div {
        height: auto;
        display: table;
        width: 100%;
        border-top: solid 1px rgba(225, 225, 225, 0.93);
        padding-top: 10px;
        margin-top: 20px;
        font-size: 1em;
    }
    @media all and (max-width : 520px) {
        .read{
            width: 90%;
        }
        .read-image{
            height: 250px;
            background-position: center;
        }
    }
</style>

<section class="ipf-read">
    <div class="read">

        <h1>{{$video['title']}}</h1>

<!--        <span>Written by iPF | Posted on &nbsp;23,June 2016.</span>-->

        <div class="read-image" >
            <iframe  height="400px" width="100%"
                @php
                  $url = $video['link'];
                  $link = "http://www.youtube.com/embed/{$url}?autoplay=1&amp;rel=0&amp;showinfo=0";
                @endphp
                     src="{{$link}}" allowfullscreen frameborder="0">
            </iframe>
        </div>

        <h2>{{$video['description']}}</h2>

        <div class="share-div">
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="{{url()->current()}}" data-text="Please read this article its awesome" data-via="tanzania_bora" data-size="small">Share</a>
            &nbsp;&nbsp;&nbsp;
            <div class="fb-share-button"
                 data-href="{{url()->current()}}"
                 data-layout="button">
            </div>
        </div>
        <div class="fb-comments" data-href="{{url()->current()}}" data-numposts="5"></div>
    </div>


</section>



<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
@endsection
