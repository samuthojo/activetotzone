@extends('layouts.app')

@section('styles')
    <style>
        body{
            background-color: #fafafa;
        }

        #booksContainer{
            padding-top: 80px;
            max-width: 950px;
            margin: auto;
        }

        .book-item{
            margin-bottom: 80px;
        }

        .book-item .description{
            padding: 0 50px;
        }

        .book-item .image{
            width: 280px;
            min-width: 280px;
            height: 360px;
            background: #000;
            overflow: hidden;
        }

        .book-item .image img{
            width: 100%;
        }

        .book-item h3{
            max-width: 80%;
            text-transform: uppercase;
            font-size: 2em;
            line-height: 1.2em;
            font-family: "Qanelas Bold", sans-serif;
            margin-bottom: 12px;
        }

        .book-item p{
            max-width: 90%;
            font-size: 1.2em;
            line-height: 1.4em;
            font-family: "Qanelas light", sans-serif;
            margin-bottom: 22px;
            text-align: left;
        }

        .book-item a{
            padding: 10px 17px;
            border: solid 3px black;
            top: 30px;
            text-transform: uppercase;
            font-family: "Qanelas",sans-serif;
            align-self: flex-start;
        }
    </style>
@endsection

@section('content')
    <div id="books">
        <div id="booksContainer">
            <div class="book-item layout">
                <div class="image">
                    <img src="{{asset('assets/images/book.jpg')}}" alt="">
                </div>
                <div class="description flex">
                    <h3>
                        Oh the time <br> places you'll go
                    </h3>
                    <p>
                        This is a wonderful book to read to your child if they have some interest in science and
                        techonlogy, it focuses on the basics and so won't get your child snoozing from boredom.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias architecto blanditiis.
                    </p>
                    <a href="#">
                        GET YOUR COPY
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
