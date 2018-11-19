<!--
  Created by PhpStorm.
  User: graysonjulius
  Date: 20/07/2016
  Time: 9:34 AM -->
<style>
    .ipf-footer{
        width: 100%;
        min-height: 350px;
        display: table;
        background-image:url("{{url('assets/images/black-Linen.png')}}");
        /* background:#111; */
        background-attachment:fixed;
        padding: 30px 0;
        display: flex;
        flex-direction: column;
        
    }
    .ipf-footer .footer-logo{
        height: 100%;
        width: 300px;
        margin:20px auto;

    }
   
    .scroll-top-button{
        width: 60px!important;
        height: 60px!important;;
        background-image: url("{{url('assets/images/arrow.png')}}");
        position: fixed!important;;
        right: 30px;
        bottom: 100px;
        display: none;
        z-index: 10;
        background-position: center;
        background-size: contain;
        background-repeat: no-repeat;
    }
    .footer-contacts{
        display:flex;
        padding: 20px 0;
        justify-content: center;

    }
    .footer-contacts >div{
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-right: 80px;
        min-height: 200px;
        justify-content: space-around;
    }
    .footer-contacts >div span{
        font-size: 1.4em;
         color: white;
    }
    .map-container{
        width: 60%;
        height: 500px;
        overflow-x: hidden;
        margin: 20px auto;
    }
    .copywrite h1{
        text-align:center;
        color:white;
        font-size:1em;
        margin-top: 40px
    }

    @media all and (max-width : 780px) {
        .map-container {
        width: 100%;
        height:400px;
        }
        .footer-contacts{
            flex-direction:column;
        }
        .footer-contacts >div{
            margin-right:0;
        }
        .copywrite h1{
            margin-bottom:40px;
        }

    }
</style>

<section class="ipf-footer">
    <div class="footer-logo">
        <img src="{{url('assets/images/logoactive_two.png')}}" width="250">
        
    </div>
    <div class="footer-contacts">
            <div>
                <img class="details-image" src="{{url('assets/images/emailico.png')}}" width="100"/> 
                <span>info@activetotzone.com</span>
            </div>
            <div>
                <img class="details-image" src="{{url('assets/images/mikocheniloc.png')}}" width="40"/> 
                <span>Kinyerezi, Dar Es Salaam</span>
            </div>
            <div>
            <img class="details-image" src="{{url('assets/images/phone.png')}}" width="40"/>
                <span>&nbsp;&nbsp;+255 719 884 169</span>
             </div>
           
    
    </div>
    <div class="map-container" id="map1">
    
    </div>
    <div class="copywrite">
        <h1 >&copy; <?=date('Y') ?> all rights reserved Active Tots Zone 
       | Website Strategies By <a href="https://ipfsoftwares.com" target="_blank">@iPF Softwares</a> </h1>
    </div>
</section>
<a class="scroll-top-button" onclick="goToTop()"></a>

<script>
    jQuery(window).on('scroll', function() {

        var height = jQuery(window).scrollTop();
        var show_target=$('.ipf-classes');

        if(show_target.length){
            if (height > show_target.offset().top-250){
                $('.scroll-top-button').fadeIn();
            }else  $('.scroll-top-button').fadeOut();
        }
    });
    function goToTop(){

        var page_top= $('.ipf-navigation');
        $('body,html').animate({
                'scrollTop': page_top.offset().top-50
            }, 1000
        );
    }

function initMap() {
    var opt = { minZoom: 10, maxZoom: 16 };

    var map1 = new google.maps.Map(document.getElementById('map1'), {
        zoom: 15,
        center: {lat: -6.8468984, lng: 39.153128}
    });
   
    map1.setOptions(opt);
   

    var image = '{{url("assets/images/locationico.png")}}'
   

    var marker = new google.maps.Marker({
        position: {lat:  -6.847170, lng: 39.150368},
        map: map1,
        icon: image
    });
   
}
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClGUi2nojUCAB1c-N1EJqkiBLId1hzx_s&callback=initMap">
</script>