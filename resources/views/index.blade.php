@extends('layouts.app')
@section('title', $title)

@section('content')
  @include('level_one.slide-show')
  @include('level_one.about')
  @include('level_one.numbers')
  @include('level_one.classes')
  @include('level_one.blogs')
  @include('level_one.instagram')
@endsection
