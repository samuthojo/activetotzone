<!--
 Created by PhpStorm.
 User: graysonjulius
 Date: 19/07/2016
 Time: 9:29 AM -->

<style>
    .ipf-navigation{
        width: 100%;
        height: 40px;
        background-color: white;
    }
    nav ul li {
        float: none;
        flex: 1;
    }
    nav[role="off-canvas"] a {
        font-size:1em;
        line-height:2.5;
    }

    @media all and (max-width : 780px) {
        .ipf-navigation{
            background-color: transparent;
            top:-50px;

        }
    }
</style>

<div class="ipf-navigation">

    <nav class="menus" >

        <label for="drop" class="toggle">&#9776;</label>
        <input type="checkbox" id="drop" />
        <ul class="menu layout justifie">
            <li id="home-li"><a href="{{url('home')}} ">home</a></li>
            <li id="blog-li"><a href="{{url('about_us')}}" class="brand-blue-color">about us</a></li>
            <li id="governance-li"><a href="{{url('blogs')}}" class="brand-red-color">blogs</a></li>
            <li id="shows-li">
                <label for="drop-4" class="toggle brand-blue-color">video lessons </label>
                <a href="#">video lessons&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
                <input type="checkbox" id="drop-4"/>
                <ul >
                    <li><a href="{{url('video/songs')}}" class="brand-purple-color">Songs</a></li>
                    <li><a href="{{url('video/stories')}}" >Stories</a></li>
                    <li><a href="{{url('video/fine_motors')}}" >Fine Motors</a></li>
                    <li><a href="{{url('video/gross_motors')}}" >Gross Motors</a></li>
                </ul>
            </li>

            <li id="media-li"><a href="{{url('contactUs')}}" class="brand-green-color">contact us</a></li>
            {{--<li id="media-li"><a href="{{url('calendar')}}" class="brand-blue-color">School Calendar</a></li>--}}
            <li id="media-li"><a href="{{url('events')}}" class="brand-blue-color">Events</a></li>
            <li id="media-li"><a href="{{url('get_books')}}" class="brand-blue-color">Books</a></li>

        </ul></nav>





<!--    <input type="checkbox" id="menu">-->
<!--    <label for="menu" onclick></label>-->
<!--    <nav role="off-canvas">-->
<!--        <ul class="menu">-->
<!--            <li id="home-li"><a href="--><?//=base_url('')?><!--" class="b">home</a></li>-->
<!--            <li id="articles-li"><a href="--><?//=base_url('about_us')?><!--" class="brand-blue-color">about us</a></li>-->
<!--            <li id="podcast-li"><a href="--><?//=base_url('blogs')?><!--" class="brand-purple-color">Blogs</a></li>-->
<!--            <li id="video-li"><a href="--><?//=base_url('video') ?><!--" class="brand-red-color">Activities</a></li>-->
<!--            <li id="nafsi-li"><a href="--><?//=base_url('contactUs') ?><!--" class="brand-green-color">Contact Us</a></li>-->
<!--            -->
<!---->
<!--        </ul>-->
<!--    </nav>-->

</div>
