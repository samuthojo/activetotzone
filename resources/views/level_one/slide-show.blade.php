<!--
 Created by PhpStorm.
 User: graysonjulius
 Date: 19/07/2016
 Time: 9:30 AM -->

<link  href="{{url('assets/css/owl-carousel/owl.carousel.css')}}" rel="stylesheet"/>
<link  href="{{url('assets/css/owl-carousel/owl.theme.css')}}" rel="stylesheet"/>
<link  href="{{url('assets/css/owl-carousel/owl.transitions.css')}}" rel="stylesheet"/>
<style>
    .ipf-slide-show{

        min-height: 560px;
        width: 100%;

    }
    @media all and (max-width : 780px) {
        .ipf-slide-show{
            top:-40px;
            min-height: auto;
        }
    }
    @media all and (max-width : 520px) {
        .ipf-slide-show{ display: none;}
    }
</style>

<section class="ipf-slide-show">
  <div id="owl-demo" class="owl-carousel slide-show">
	<div class="item">
            <img src="{{url('assets/images/activetotsbanner1.jpg')}}" width="100%" alt="Active Tots Zone">
        </div>
        <div class="item">
            <img src="{{url('assets/images/activetotsbanner3.png')}}" width="100%" alt="Active Tots Zone">
        </div>
        <div class="item">
            <img src="{{url('assets/images/activetotsbanner.png')}}" width="100%" alt="Active Tots Zone">
        </div>
        <div class="item">
            <img src="{{url('assets/images/activetotsbanner1.jpg')}}" width="100%" alt="Active Tots Zone">
        </div>
        <div class="item">
            <img src="{{url('assets/images/activetotsbanner2.jpg')}}" width="100%" alt="Active Tots Zone">
        </div>
    </div>
</section>

<script  src="{{url('assets/css/owl-carousel/owl.carousel.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            slideSpeed: 400,
            paginationSpeed: 400,
            singleItem: true,
            autoPlay: 10000,
            navigation: false,
            pagination: false,
            responsive: true,
            transitionStyle: "goDown"//"fade,fadeUp,backSlide,goDown"

            // "singleItem:true" is a shortcut for:
            // items : 1,
            // itemsDesktop : false,
            // itemsDesktopSmall : false,
            // itemsTablet: false,
            // itemsMobile : false

        });
    });
</script>
