<!--
 Created by PhpStorm.
 User: graysonjulius
 Date: 28/04/16
 Time: 4:33 PM --> 
<style>
    .ipf-top-nav{
        width: 100%;
        height: 50px;
        background-color: black;
    }
    .ipf-top-nav > div{
        float: left;
        height: 100%;
        width: 33.333%;
    }
    .logo-container{
       padding: 7px 10px;
        padding-left: 30px;
    }
    .icon-circle{
        width: 37px;
        height: 37px;
        display: block;
        border-radius: 50%;
        margin-top: 5px;
        border: solid 2px white;
        float: left;
        text-align: center;
        color: white;
        padding-top: 8px;
        font-size: 1em;
    }
    .phone-container{
        padding-left: 10%;
    }
    .phone-container >div{
        height: 40px;
        margin-top: 5px;
        float: left;
        margin-left: 20px;
        border-left: solid 1px white;
        padding-left: 20px;
        color: white;
        padding-top: 8px;
        letter-spacing: 0.011em;
    }
    .social-container{
        padding-left: 10%;
    }
    .social-container >div{
        height: 40px;
        margin-top: 5px;
        border-left: solid 1px white;
        padding-left: 10px;
    }
    .social-container a{
        margin-left: 10px;
        margin-top: 0;
    }
    .call-btn{
        display: none;
        position: fixed;
        width: 100vw;
        height: 50px;
        z-index: 11;
        bottom: 0;
        text-align: center;
        color: white;

        padding-top: 12px;

    }
    @media all and (max-width : 780px) {
        .social-container{
            display: none;
        }
        .phone-container{
            padding-left: 0;
        }
        .logo-container{
            padding: 7px 0;
            width: 50%!important;
            /*margin-left: 40px;*/

        }
    }

    @media all and (max-width : 520px) {
        .phone-container,.social-container{
            display: none;
        }
        .logo-container{
            padding: 7px 0;
            width: 100%!important;
            padding-left: 30px;

        }
        .logo-container img{
            width: 60%;
            margin: 0 auto;
            display: block;
        }
        .call-btn{
            display: block;
        }
    }
</style>

<section class="ipf-top-nav">

    <div class="logo-container">
        <img src="{{url('assets/images/activelogo.png')}}" >
    </div>
    <div class="phone-container">
        <span class="icon-circle brand-green">
            <i class="fa fa-phone"></i>
        </span>
        <div>
            <span style="font-size: 1.1em"> +255 719 884 169</span><br/>

        </div>
    </div>
    <div class="social-container">
        <div>
            <a class="icon-circle " href="https://web.facebook.com/activetotszone/?fref=ts" target="_blank" style="background-color: #3b5998;" >
                <i class="fa fa-facebook"></i>
            </a>
            <a class="icon-circle " href="https://twitter.com/activetotszone0" target="_blank" style="background-color: #00aced">
                <i class="fa fa-twitter"></i>
            </a>
            <a class="icon-circle " href="https://www.instagram.com/activetotszone/" target="_blank" style="background-color: #517fa4">
                <i class="fa fa-instagram"></i>
            </a>
        </div>
    </div>

</section>
<a class="call-btn brand-green" href="tel:+255719884169">
    <i class="fa fa-phone" style="font-size: 1.6em;line"></i>&nbsp;&nbsp;&nbsp;<span style="font-size: 1.2em;">Call Active TOT's</span>
</a>
