<!--
 Created by PhpStorm.
 User: graysonjulius
 Date: 19/07/2016
 Time: 10:06 PM -->

<style>
    .ipf-blog{
        width: 100%;
        height: auto;
        display: table;
        background-image: url("{{url('assets/images/banner.jpg')}}");
        padding:40px 5%;
        background-size: cover;
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
        font-size: 2em;
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
	
	.blog.temp img{
		height: 200px;
		background-color: #ddd;
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
    @media all and (max-width : 520px) {
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

    <h1>Latest Blog Posts</h1>

    {{--@if(count($blogs) > 0)--}}
    	@for($i = 0; $i < 3; $i++)
         {{--@php--}}
      	   {{--$image = $blog['image'];--}}
           {{--$link = $blog['title'];--}}
      	   {{--$link = preg_replace('/[^A-Za-z0-9\. -]/', '', $link);--}}
      	   {{--$link = preg_replace('/  */', '-', $link);--}}
      	   {{--$link = preg_replace('/\\s+/', '-', $link);--}}
         {{--@endphp--}}
               {{--Display only top three blogs--}}
        		<a href="">
					<div class="blog temp">
						<img>

						<h1 class="{{'post-date' . ' ' . (($i == 0) ? 'brand-green-color' :
											(($i == 1) ? 'brand-red-color' : 'brand-blue-color'))}}">
							Some dummy title
						</h1>
						<h2 class="post-title"></h2>
						<h3 class="post-summary"></h3>
						<h1 class="{{'post-date' . ' ' . (($i == 0) ? 'brand-green-color' :
											(($i == 1) ? 'brand-red-color' : 'brand-blue-color'))
											}}">
							read more</h1>
					</div>
				</a>

    	     @endfor
        {{--@endif--}}
    <h1 style="margin-top: 60px;font-family: 'Qanelas light',sans-serif!important;" >Follow Us On Instagram, <br/> <a href="https://www.instagram.com/activetotszone/" target="_blank">@activetotszone</a></h1>
</section>
