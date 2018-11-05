@extends('layouts.app')
@section('title', $title)

@section('content')
  @include('level_one.slide-show')
  @include('level_one.about')
  <br><br><br>
  {{--@include('level_one.numbers')--}}
  @include('level_one.classes')
  @include('level_one.testimonials')
  @include('level_one.blogs')
  @include('level_one.registration')
  @include('level_one.instagram')
@endsection
