@extends('layouts.app')
@section('title', $title)
@section('content')
<style>
    .ipf-calendar{
        width: 100%;
        min-height: 100vh;
        padding: 10px 5% 50px;
        background-color: #ECF0F1;;
        /*background-image: url(*/<?//=base_url('assets/images/activecalendar.png')?>/*);*/
    }
    @media all and (max-width : 520px) {
        .ipf-calendar{
            top:-40px;
        }
    }

</style>

<section class="ipf-calendar">
<!--    <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ECF0F1&amp;src=graysonjulius%40gmail.com&amp;color=%231B887A" style="border-width:0" width="100%!important" height="600" frameborder="0" scrolling="no"></iframe>-->
    <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23ECF0F1&amp;src=activetotszone%40gmail.com&amp;color=%231B887A" style="border-width:0" width="100%!important" height="600" frameborder="0" scrolling="no"></iframe>
</section>
@endsection
