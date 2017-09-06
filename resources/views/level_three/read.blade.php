
<!--
 Created by PhpStorm.
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
        width: 70%;
        height: auto;
        display: table;
        margin: 0 auto;
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
    .contents-h2{
        width: 100%;
        height: auto;
        display: table;
    }
    .read .contents-h2{
        font-size: 1.2em;
        line-height: 1.3;
        font-weight: 300;
        color: #000;

    }
    .read .contents-h2 p{
        text-align: justify!important;
        margin-bottom: 5px;
    }
    .read .contents-h2  a{
        color: blue;
        text-decoration: underline;

    }
    .read .contents-h2 ul li{
        list-style: disc!important;
        list-style-position: inside!important;;
        font-style: italic;
    }
    .read .contents-h2 p .s7, .read .contents-h2 p strong{
        font-weight: 700;
        color: dodgerblue;
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
        .read .contents-h2 p img{
            width: 100%;
        }
        .read-image{
            height: 250px;
            background-position: center;
        }
    }
</style>

<section class="ipf-read">
    <div class="read">

        <h1>{{$blog['title']}}</h1>

        <span>Written by {{$blog['author']}} | Posted on &nbsp; {{$blog['date']}}</span>

        <div class="read-image" style="background-image: url('{{url("uploads/" . $blog['image'])}}');"></div>

        <div class="contents-h2">{!!$blog['description']!!}</div>

        <div class="share-div">
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="{{url()->current()}}" data-text="Please read this article its awesome" data-via="activetotszone" data-size="small">Share</a>
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
