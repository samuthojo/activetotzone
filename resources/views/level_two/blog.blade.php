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

       min-height: 550px;
        display: table-cell;
        margin:40px 1.5%;
        background-color: white;
        z-index: 2;
        float: left;

    }
    .blog  >img{
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
        text-align: left!important;

    }
    .blog .post-summary p{
        text-align: left!important;
    }
    @media all and (min-width : 1400px) {
        .blog{
            width: 25%;
            max-width: 520px;
            min-height: 600px;
        }
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
    <h1 > Blog Posts</h1>
    @if(count($blogs) > 0)
	    @foreach($blogs as $blog)
    		@php
    			$image = $blog['image'];
    			$link = $blog['title'];

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

    		<a href="{{url('read/'.$blog['id'].'/'.$link)}}">
    		    <div class="blog">

    		        <img src="{{url('uploads/' . $image)}}">

    		        <h1 class="{{'post-date' . ' ' . (($loop->index % 2) == 1 ? 'brand-blue-color' : 'brand-green-color')}}">{{$blog['date']}}</h1>
    		        <h2 class="post-title">{{$blog['title']}}</h2>
    		        <h3 class="post-summary">{!!substr($blog['description'],0,250)!!} ...</h3>
    		        <h1 class="{{'post-date' . ' ' . (($loop->index % 2) == 1 ? 'brand-blue-color' : 'brand-green-color')}}">read more</h1>
    		    </div>
    		</a>

	    @endforeach
     @endif
</section>
@endsection
