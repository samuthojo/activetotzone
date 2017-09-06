@extends('layouts.app')
@section('title', $title)
@section('content')
  <style>
    .ipf-contact-us{
        width: 100%;
        background-color: #ECF0F1;;
        height:auto;
        display: table;
        padding: 50px 5%;
    }
    .ipf-contact-us>h1{
         font-family: "Love light", serif;
         font-size: 2.5em;
         text-align: center;
     }
    .ipf-contact-us>h2{
        font-size: 1.8em;
        width: 50%;
        margin: 20px auto;
        text-align: center;
        margin-bottom: 80px;

    }
    .location-icon{
        width: 68px;
        height: 100px;
        background-image: url("{{url('assets/images/locationico.png')}}");
        display: block;
        margin: 0 auto;
        margin-top: 50px;
    }
    .chanika-branch,.mikocheni-branch{
        width: 45%;
        height: 500px;
        float: left;
        margin-left: 5%;
    }

    .contact-details{
        width: 100%;
        height: auto;
        display: table;
        margin: 0 auto;
    }
    .contact-details .details{
        width: 45%;
        height: 80px;
        float: left;
        margin-left: 5%;
        padding-left: 100px;
        font-size: 1.8em;
    }
    .details span{
        width: calc(100% - 136px);
        float: left;
        display: block;
        line-height: 4;
    }
    .details .details-image{
        /*height: 100px;*/

        display: inline-block;
        float: left;
    }
    .chanika-branch h1{
        border-bottom: solid 2px #3A539B;
        text-align: center;
        font-size: 1.5em;
        text-transform: uppercase;
        font-family: "Qanelas bold",sans-serif;
        line-height: 1.7;
    }
    .mikocheni-branch h1{
         border-bottom: solid 2px #EF4836;
        text-align: center;
        font-size: 1.5em;
        text-transform: uppercase;
        font-family: "Qanelas bold",sans-serif;
        line-height: 1.7;
    }
    .map-container{
        width: 100%;
        height: 400px;
        overflow-x: hidden;
        margin-top: 50px;

    }
    #map1{
        border: solid 1px #3A539B;
    }
    #map2{
        border: solid 1px #EF4836;
    }
    .branch-contact{
        text-align: center;
        line-height: 2;
    }
    @media all and (max-width : 780px) {
        .ipf-contact-us{
            top:-40px;
        }
        .ipf-contact-us>h2{
            width: 100%;
        }
        .contact-details .details{
            width: 100%;
            margin-left: 0%;
            padding-left: 0;
        }
        .details .details-image{
            display: none;
        }
        .details span{
            width: 100%;
        }
        .chanika-branch,.mikocheni-branch{
            width: 100%;
            float: none;
            margin-left: 0;
            margin-top: 40px;
            padding-left: 0;
        }
    }
</style>

<section class="ipf-contact-us">

    <h1>Contact Us </h1>
    <h2>"We guarantee that your child’s time here will be a stimulating, exciting and happy learning experience."</h2>
    <div class="contact-details">
        <div class="details">
            <img class="details-image" src="{{url('assets/images/emailico.png')}}" width="136"/>
            <span>&nbsp;&nbsp;info@activetotzone.com</span>
        </div>
        <div class="details">
            <img class="details-image" src="{{url('assets/images/phone.png')}}" width="71"/>
            <span>&nbsp;&nbsp;+255 719 884 169</span>
        </div>
    </div>
    <br/><br/><br/><br/>
    <span class="location-icon"></span>

    <h1>Our Branches</h1><br/><br/><br/><br/>
    <div class="chanika-branch">
        <h1>kinyerezi</h1>
        <h2 class="branch-contact">WhatsApp:-&nbsp; +255 712 210 899 | 7 AM - 6 PM</h2>
        <div class="map-container" id="map1"></div>
    </div>
    <div class="mikocheni-branch">
        <h1>Mikocheni</h1>
        <h2 class="branch-contact">WhatsApp:-&nbsp; +255 689 604 866 | 7 AM - 6 PM </h2>
        <div class="map-container" id="map2"></div>
    </div>


</section>

<script type="text/javascript">


    function initMap() {
        var opt = { minZoom: 10, maxZoom: 16 };

        var map1 = new google.maps.Map(document.getElementById('map1'), {
            zoom: 15,
            center: {lat: -6.8468984, lng: 39.153128}
        });
        var map2 = new google.maps.Map(document.getElementById('map2'), {
            zoom: 16,
            center: {lat: -6.76263, lng: 39.2501917}
        });
        map1.setOptions(opt);
        map2.setOptions(opt);

        var image = '{{url("assets/images/locationico.png")}}'
        var image2 = '{{url("assets/images/mikocheniloc.png")}}'

        var marker = new google.maps.Marker({
            position: {lat:  -6.847170, lng: 39.150368},
            map: map1,
            icon: image
        });
        var marker = new google.maps.Marker({
            position: {lat:  -6.762603, lng: 39.252380},
            map: map2,
            icon: image2
        });
    }
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClGUi2nojUCAB1c-N1EJqkiBLId1hzx_s&callback=initMap">
</script>
@endsection
