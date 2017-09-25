<!--
 Created by PhpStorm.
 User: graysonjulius
 Date: 5/19/15
 Time: 11:10 AM -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Nursery education, nursery school, nursery school kinyerezi, nursery school mikocheni, nursery school dar, nursery school in dar es salaam Tanzania, nursery center dar es salaam, best nursery center, nursery center, nursery center kinyerezi, nursery center mikocheni, kindergarten school, best kindergarten school, kindergarten school dar es salaam, kindergarten center dar es salaam, preschool dar es salaam, best preschool, preschool, preschool center dar es salaam, day care school dar es salaam, day care center dar es salaam, best day care center dar, English medium Tanzania, English medium school, International school dar es salaam, Kids center, Children playground, Active tot zone, activetotzone, Education center, shule za watoto, shule ya watoto, chekechea, kinyerezi, mikocheni">
    <meta name="description" content="At Active Tot's Zone, we strive to provide a safe and developmentally appropriate environment for preschool age children. We teach to the need of each individual child and nurture their interest. Our focus is to provide a stimulating and hands-on educational experience which promotes each child's social, emotional, physical and cognitive development.">
    <meta name="author" content="iPF Softwares" >
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:url"                content="http://www.activetotzone.com" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Active TOTS ZONE | | Play,learn & grow Together." />
    <meta property="og:description"        content="At Active Tot's Zone, we strive to provide a safe and developmentally appropriate environment for preschool age children. We teach to the need of each individual child and nurture their interest. Our focus is to provide a stimulating and hands-on educational experience which promotes each child's social, emotional, physical and cognitive development." />
    <meta property="og:image"              content="{{url('assets/images/logoactive_two.png')}}" />


    <meta charset="UTF-8">
    <title> @yield('title') | Play Grow & Play Together.</title>



    <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" integrity="sha384-dNpIIXE8U05kAbPhy3G1cz+yZmTzA6CY8Vg/u2L9xRnHjJiAK76m2BIEaSEV+/aU" crossorigin="anonymous">
    <link  href="{{url('assets/css/reset.css')}}" rel="stylesheet"/>

    <link  href="{{url('assets/css/navigationlinks.css')}}" rel="stylesheet"/>

    <link  href="{{url('assets/css/animate.css')}}" rel="stylesheet"/>
    <link  href="{{url('assets/css/flex.css')}}" rel="stylesheet"/>
    <link  href="{{url('assets/css/owl-carousel/owl.carousel.css')}}" rel="stylesheet"  type="text/css"/>
    <link  href="{{url('assets/css/owl-carousel/owl.theme.css')}}" rel="stylesheet"  type="text/css"/>
    <link  href="{{url('assets/css/owl-carousel/owl.transitions.css')}}" rel="stylesheet"  type="text/css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="{{url('assets/js/prefixfree.min.js')}}" type="text/javascript"></script>

    @yield('styles')

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '523285071204872');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=523285071204872&ev=PageView&noscript=1"
        /></noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->
</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>


<script defer async>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-70765388-5', 'auto');
    ga('send', 'pageview');

</script>

@yield('scripts')