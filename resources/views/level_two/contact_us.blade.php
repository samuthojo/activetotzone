@extends('layouts.app')
@section('title', $title)
@section('content')
  <style>
    .ipf-contact-us{
        width: 100%;
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
    .contact-container{
        
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
    
   

</section>
@include('level_one.registration')

@endsection
