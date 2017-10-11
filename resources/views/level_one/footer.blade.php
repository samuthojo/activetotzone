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
        padding: 30px 0;
    }
    .ipf-footer >div{
        height: 100%;
        float: left;
        width: 20%;
        border-right: solid 1px rgba(174, 174, 174, 0.1);
        padding: 20px 20px 20px 50px;

    }
    .ipf-footer >div:first-child{
        width: 30%;
    }
    .ipf-footer >div:last-child{
        width: 30%;
    }

    .footer-links a{
        width: 100%;
        display: table;
        color: white;
        line-height:2;
        font-size: 1.1em;
    }

    .ipf-footer div >h1{
        font-family: "Love light", serif;
        font-size: 1.5em;
        color: white;
        margin-bottom: 5px;
    }
    .footer-social >div,.footer-calendar >div{
        width: 100%;
        display: table;
        margin-top: 7px;
    }
    .footer-social >div >span,.footer-calendar >div >span{
        color: white;
        line-height: 2.5;
        left: 15px;
        font-size: 1.1em;
    }
    .footer-calendar .icon-circle{
        width: 60px;
        height: 60px;
    }
    .footer-calendar >div >span{
        line-height: 3;
        font-size: 1.1em;
    }
    .footer-calendar >div i{
        font-family: "Qanelas bold",sans-serif;
        line-height: 2.5;
        font-size: 0.9em;
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

    @media all and (max-width : 780px) {
        .ipf-footer{
            margin-bottom: 50px;
        }
        .ipf-footer >div{
            height: 100%;
            float: left;
            width: 50%;
        }
        .ipf-footer >div:first-child{
            width: 100%;
        }
        .ipf-footer >div:last-child{
            width: 100%;
        }
        .footer-social >div >span{
            display: none;
        }
        .footer-logo img{
            width: 80%;
        }


    }
</style>

<section class="ipf-footer">
    <div class="footer-logo">
        <img src="{{url('assets/images/logoactive_two.png')}}">
        <h1 style="font-size:1em;margin-top: 40px">&copy; <?=date('Y') ?> all rights reserved.</h1>
        <h1 style="font-size:1em;margin-top: 10px">Crafted <a href="http://ipfsoftwares.com" target="_blank">@iPF Softwares</a> </h1>
    </div>
    <div class="footer-links">
        <h1>Quick links</h1>
        <a href="{{url('about_us')}}">About Us</a>
        <a href="{{url('blogs')}}">Blogs</a>
        <a href="{{url('calendar')}}">Our Calendar</a>
        <a href="{{url('contactUs')}}">Contact Us</a>
        <a href="http://www.directory.co.tz/active-tots-zone" target="_blank">Directory</a>
    </div>
    <div class="footer-social">
        <h1>Follow Us</h1>
        <div>
            <a class="icon-circle " href="https://web.facebook.com/activetotszone/?fref=ts" target="_blank" style="background-color: #3b5998;" >
            <i class="fa fa-facebook"></i>
            </a>
            <span><a href="https://web.facebook.com/activetotszone/?fref=ts" target="_blank">Facebook</a></span>
        </div>

       <div>
           <a class="icon-circle " href="https://twitter.com/activetotszone0" target="_blank" style="background-color: #00aced">
            <i class="fa fa-twitter"></i>
           </a>
           <span><a href="https://twitter.com/activetotszone0" target="_blank">Twitter</a></span>
       </div>
       <div>
           <a class="icon-circle " href="https://www.instagram.com/activetotszone/" target="_blank" style="background-color: #517fa4">
            <i class="fa fa-instagram"></i>
        </a>
           <span><a  href="https://www.instagram.com/activetotszone/" target="_blank">Instagram</a></span>
       </div>
    </div>
    <div class="footer-calendar">
        <h1>Important Dates</h1>
        @foreach($important_dates as $day)
            <div class="layout center">
                <a class="icon-circle {{$loop->index % 2 == 0 ? 'brand-purple'  : 'brand-purple'}}" >
                    <i>
                        {{$day->nicedate()}}
                    </i>
                </a>
                <span>
                    {{$day->issue}}
                </span>
            </div>
        @endforeach
       <!-- <div>
            <a class="icon-circle brand-green" >
                <i>26,Aug</i>
            </a>
            <span>Play Day Mikocheni</span>
        </div>
        <div>
            <a class="icon-circle brand-blue"  >
                <i>17,July</i>
            </a>
            <span>School Opens</span>
        </div>-->
<!--        <div>-->
<!--            <a class="icon-circle brand-purple"  >-->
<!--                <i>5,Aug</i>-->
<!--            </a>-->
<!--            <span>Play Day Kinyerezi</span>-->
<!--        </div>-->
    </div>
<!--    -->
</section>
<a class="scroll-top-button" onclick="goToTop()"></a>

<script>
    jQuery(window).on('scroll', function() {

        var height = jQuery(window).scrollTop();
        var show_target=$('.ipf-classes');
        if (height > show_target.offset().top-250){
            $('.scroll-top-button').fadeIn();
        }else  $('.scroll-top-button').fadeOut();

    });
    function goToTop(){

        var page_top= $('.ipf-navigation');
        $('body,html').animate({
                'scrollTop': page_top.offset().top-50
            }, 1000
        );
    }

</script>
