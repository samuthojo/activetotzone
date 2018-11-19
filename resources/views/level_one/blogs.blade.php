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
        /* background-image: url("{{url('assets/images/banner.jpg')}}"); */
        padding:90px 0 0;
        background-size: cover;
    }


    .ipf-blog >h1{
        text-align: center;
        font-size: 2.5em;
        color: black;
        width: 100%;
        margin-bottom:10px;
    }
    .ipf-blog >h2{
        font-size: 1em;
        text-align: center;
         margin-bottom: 50px;
         font-weight: 400;
    }
    .blog-container{
        display:flex;
        width:100%;
        justify-content: center;
        padding:50px 5%;
        padding-left:calc(5% + 50px);
    }
    .blog-container a{
        margin:40px 0;
        margin-right:50px;
        z-index: 2;
        flex:1;     
    }
    

    .blog-image{
        max-height: 350px;
        overflow: hidden;
        margin-bottom:30px;
    }

    .blog-image img{
        width:100%;
    }

     .read-more{
       padding:11px 10px;
       min-width:200px;
       border:solid 2px black;
       border-radius:3px;
       text-align:center;
       font-size:1.1em;
       font-weight:bold;
       text-transform:capitalize;
       position: absolute;
       bottom: -80px;
       
       
    }
    .blog .post-title{
        font-size:2em;
        padding: 10px 10px 5px;
        text-align: left;
        font-weight:bold;
        color:#53539a;
    }
    .blog .post-summary{
        font-size: 1.3em;
        padding: 10px;
        text-align: left!important;
        /* height:150px; */
    }
    .blog .post-summary p{
        text-align: left!important;
    }
    @media all and (max-width : 520px) {
            .blog-container{
                flex-direction:column;
                padding:20px 10px;
            }
            .ipf-blog{
                padding: 50px 0 0
            }
            .ipf-blog >h1{
                font-size: 1.5em;
                margin: 0 10px;
                font-family: "Qanelas bold",sans-serif;
            }
            .blog-container a{
                margin-right:0;
                margin-bottom:70px;
            }
        
    }
</style>

<section class="ipf-blog">
    <h1> Lessons & Tips To Parents. </h1>
    <h2>We're doing our very best to publish new lessons every month for parents,<br/>keep visiting our website for latest articles.</h2>
    <div class="blog-container">
    @if(count($blogs) > 0)
    	@foreach($blogs as $blog)
			@php
				$image = $blog['image'];
				$link = $blog['link'];
				$label = (($loop->index == 0) ? 'brand-green-color' : (($loop->index == 1) ? 'brand-red-color' : 'brand-blue-color'));
			@endphp
               {{--Display only top three blogs--}}

			<a href="{{$link}}">
				<div class="blog">
					<div class="blog-image">
                        <img src="{{asset('uploads/' . $image)}}">
                    </div>
					<h2 class="post-title">{{$blog['title']}}</h2>
					<h3 class="post-summary">{!!str_limit($blog['description'],200)!!}</h3>
					
				</div>
                <h1 class="read-more">
						Continue reading
					</h1>
			</a>
		 @endforeach
	@endif

    </div>

    
</section>
