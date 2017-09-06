<!doctype html>
<html lang="en">
<head>
@include('cms.header')
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Viewport Metatag -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <!-- Plugin Stylesheets first to ease overrides -->

    <title>Activetotszone.com</title>
    <style>
        .ipf-preloader{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding-top: 1.5%;
            height: 40px;
            z-index: 9999;
            text-align: center;
            align-content: center;
            display: none;
        }
    </style>
</head>

<body>


<!-- Header -->
<div id="mws-header" class="clearfix">

    <!-- Logo Container -->
    <div id="mws-logo-container">

        <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        <div id="mws-logo-wrap">
            <img src="assets/images/activelogo.png" alt="activetotszone admin">
        </div>
    </div>

    <!-- User Tools (notifications, logout, profile, change password) -->
    <div id="mws-user-tools" class="clearfix">

        <!-- User Information and functions section -->
        <div id="mws-user-info">
                <ul>
                    <li><a href="{{url('logout')}}">Logout</a></li>
                </ul>
        </div>
    </div>
</div>

<!-- Start Main Wrapper -->
<div id="mws-wrapper">

<!-- Necessary markup, do not remove -->
<div id="mws-sidebar-stitch"></div>
<div id="mws-sidebar-bg"></div>

<!-- Sidebar Wrapper -->
<div id="mws-sidebar">

    <!-- Hidden Nav Collapse Button -->
    <div id="mws-nav-collapse">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- Main Navigation -->
    <div id="mws-navigation">
        <ul>
            <li>
                <a href="#"><i class="icon-list"></i> Menu </a>
                <ul>
                    <li><a href="javascript:menu_links('blog');">Blogs</a></li>
                    <li><a href="javascript:menu_links('video');">Videos</a></li>
                    <li><a href="javascript:menu_links('team');">Our team</a></li>
                    <li><a href="javascript:menu_links('password');">Change password</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

@yield('content')
