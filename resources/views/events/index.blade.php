@extends('layouts.app')

@section('styles')
    <style>
        body{
            background-color: #fafafa;
        }
        #events{
            min-height: 500px;
        }

        #upComingEvent{
            position: relative;
            padding-top: 80px;
            background: #f0f0f0;
            overflow: hidden;
        }

        #upComingEvent .bg{
            position: absolute;
            left: 0;
            top: 440px;
            width: 100%;
            height: 100%;
            background-color: #fafafa;
        }

        #upComingEvent #card{
            margin: auto;
            margin-bottom: 80px;
            max-width: 980px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
            background-color: #fff;
        }

        #upComingEvent #title{
            position: relative;
            background-color: #fff;
            border-bottom: 1px solid #eee;
        }

        #upComingEvent #title .image{
            background: #ddd;
            background-size: cover;
            overflow: hidden;
            background-position: center;
            background-image: url({{asset('assets/images/playdayposter2.png')}});
        }

        #upComingEvent #title .image img{
            opacity: 0;
            pointer-events: none;
        }


        #upComingEvent #title .text{
            padding: 40px;
            width: 390px;
            height: 400px;
        }

        #upComingEvent #title .text .lone-date{
            font-size: 30px;
            margin-bottom: 12px;
        }

        #upComingEvent #title .text h1{
            font-size: 2em;
            line-height: 1.2em;
            margin-bottom: 8px;
            margin-top: 8px;
            font-family: "Love Ya Like A Sister", serif;
        }

        #upComingEvent #title .text > p{
            text-align: left;
            font-size: 1.3em;
            font-family: "Qanelas Regular", sans-serif;
        }

        #upComingEvent #title .text span{
            display: block;
            font-size: 1em;
            font-family: "Qanelas light", sans-serif;
        }

        #infos{
            margin: 20px 0;
        }

        #infos p{
            text-align: left;
            margin-bottom: 12px;
        }

        #infos p i{
            margin-right: 4px;
        }

        #bookBtn{
            width: 100%;
            height: 40px;
            display: block;
            text-align: center;
            line-height: 2.5;
            margin-top: 25px;
            background: #913d88;
            color: #fff;
            font-family: "Qanelas Regular",sans-serif;
        }

        #upComingEvent #content{
            padding: 20px;
        }

        #upComingEvent #leftContent{
            
        }

        #leftContentContainer{
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }

        #leftContentContainer p{
            text-align: left;
        }

        #upComingEvent #leftContent #description{

        }

        #upComingEvent #leftContent #description h3{
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 8px;
        }

        #upComingEvent #leftContent #description p{
            font-family: "Qanelas light", sans-serif;
            font-size: 1.1em;
            line-height: 1.7;
        }

        #upComingEvent #shareEvent{
            margin-top: 40px;
        }

        #upComingEvent #shareEvent h3{
            font-weight: bold;
            font-size: 15px;
            margin-bottom: 12px;
        }

        #upComingEvent #shareEvent .icon{
            width: 42px;
            height: 42px;
            border-radius: 50%;
            font-size: 20px;
            background: #f0f0f0;
            margin-right: 12px;
        }

        #upComingEvent #rightContent{
            width: 350px;
        }

        #upComingEvent #rightContent h3{
            font-weight: bold;
            font-size: 15px;
            margin-top: 20px;
            margin-bottom: 12px;
        }

        #upComingEvent #rightContent #eventMap{
            height: 250px;
            background: #f0f0f0;
        }

        #otherEvents{
            margin-bottom: 40px;
        }

        #otherEvents h2{
            font-weight: bold;
            font-size: 25px;
            margin-bottom: 12px;
            text-align: center;
        }

        #otherEvents #eventList{
            padding-left: 12px;
            max-width: 980px;
            margin: auto;
            margin-top: 30px;
            margin-bottom: 70px;
        }

        #otherEvents .event-item{
            width: calc(33.333% - 12px);
            margin-right: 12px;
            text-align: center;
        }

        #otherEvents .event-item .image{
            height: 200px;
            background: #eee;
            margin-bottom: 18px;
            overflow: hidden;
        }

        #otherEvents .event-item .image img{
            width: 100%;
        }

        #otherEvents .event-item h3{
            font-family: Qanelas, sans-serif;
            font-size: 20px;
        }

        #otherEvents .event-item p{
            font-size: 16px;
        }
    </style>
@endsection

@section('content')
    <div id="events">
        <div id="upComingEvent" class="gradient-wrap">
            <div class="bg"></div>
            <div id="card">
                <div id="title" class="layout">
                    <div class="image flex">
                        <img src="{{asset('assets/images/playdayposter2.png')}}" alt="" style="width: 100%;">
                    </div>
                    <div class="text layout vertical justified">
                        <span>UPCOMING EVENT</span>
                        <h1>Playday season 1 episode 16</h1>
                        <div id="infos">
                            <p><i class="fa fa-calendar"></i>Sep 30th</p>
                            <p><i class="fa fa-clock-o"></i>From 7:30AM</p>
                            <p><i class="fa fa-map-marker"></i>Activetotz Kinyerezi</p>

                            <a href="#" id="bookBtn" class="brand-color-purple">
                                BOOK EVENT
                            </a>
                        </div>
                    </div>
                </div>

                <div id="content" class="layout">
                    <div id="leftContent" class="flex">
                        <div id="leftContentContainer">
                            <div id="description">
                                <h3>DESCRIPTION</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, adipisci, architecto dolorem ea ex fugit id incidunt ipsa libero magnam, minus nemo numquam placeat possimus recusandae saepe sunt voluptate voluptates!
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, ad
                                </p>
                            </div>

                            <div id="shareEvent">
                                <h3>SHARE WITH FRIENDS</h3>
                                <div class="layout">
                                    <a href="#" class="icon layout center-center">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#" class="icon layout center-center">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#" class="icon layout center-center">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="rightContent">
                        <h3>EVENT LOCATION</h3>
                        <div id="eventMap" style="position: relative;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div id="otherEvents">
            <h2>Past Events</h2>
            <div id="eventList" class="layout">
                <a href="#" class="event-item">
                    <div class="image">
                        <img src="{{asset('assets/images/events/1.jpg')}}" alt="">
                    </div>
                    <h3>
                        Parents &amp; Playday Episode 15
                    </h3>
                    <p>
                        Click to see more
                    </p>
                </a>

                <a href="#" class="event-item">
                    <div class="image">
                        <img src="{{asset('assets/images/events/2.jpg')}}" alt="">
                    </div>
                    <h3>
                        Parents &amp; Playday Episode 14
                    </h3>
                    <p>
                        Click to see more
                    </p>
                </a>

                <a href="#" class="event-item">
                    <div class="image">
                        <img src="{{asset('assets/images/events/3.jpg')}}" alt="">
                    </div>
                    <h3>
                        Parents &amp; Playday Episode 13
                    </h3>
                    <p>
                        Click to see more
                    </p>
                </a>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/grade.js')}}"></script>
    <script type="text/javascript">
//            /
        function initMap() {
            var opt = { minZoom: 17, maxZoom: 17 };
            var map1 = new google.maps.Map(document.getElementById('eventMap'), {
                zoom: 17,
                center: {lat: -6.762209, lng: 39.2500213}
            });

//                map1.setOptions(opt);
//                var image = 'http://ekihya.co.tz/assets/images/marker.png';
//                var marker = new google.maps.Marker({
//                    position: {lat: -6.762209, lng: 39.2500213},
//                    map: map1,
//                    icon: image
//                });
        }
        window.addEventListener('load', function(){
            Grade(document.querySelectorAll('.gradient-wrap'))
        })
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClGUi2nojUCAB1c-N1EJqkiBLId1hzx_s&callback=initMap">
    </script>
@endsection
