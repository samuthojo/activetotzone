@extends('layouts.app')
@section('title', "Page Not Found");
@section('content')
<style>

    .error-container{
        width: 100%;
        min-height: 50vh;
        display: table;
        background-color: whitesmoke;
        background-image: url("{{url('assets/images/schoolbg.png')}}");
        background-repeat: repeat;
    }
    .error-message{
        position: absolute;
        top:50%;
        left: 50%;
        transform: translate(-50%,-50%);
        font-size: 5em;
        font-family: "Qanelas bold",sans-serif;
        text-align: center;
        color: red;
    }


</style>


<div class="error-container">
<h1 class="error-message">404<br/> Something Went Wrong,Sorry. </h1>
</div>
@endsection
