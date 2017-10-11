@extends('layouts.app')

@section('styles')
    <style>
        body{
            background-color: #fafafa;
        }

        #pageHeader{
            text-align: center;
        }

        #pageHeader h1{
            font-size: 2.8em;
            font-family: "Love light", serif;
        }

        #pageHeader h2{
            max-width: 800px;
            margin: auto;
            font-size: 1.6em;
            font-family: "Qanelas light",sans-serif;
        }

        #comingSoon{
            font-size: 1.3em;
            font-family: "Qanelas light",sans-serif;
            padding: 2em 0;
        }

        #booksContainer{
            padding-top: 80px;
            padding-bottom: 40px;
            max-width: 950px;
            margin: auto;
        }

        #booksList{
            display: none;
            margin-top: 50px;
        }

        .book-item{
            margin-bottom: 80px;
            width: calc(33.333% - 10px);
            margin-right: 10px;
            text-align: center;
        }

        .book-item .image{
            height: 360px;
            overflow: hidden;
        }

        .book-item .image img{
            height: 100%;
            display: inline-block;
        }

        .book-item h3{
            font-size: 1.3em;
            font-family: "Qanelas Bold", sans-serif;
            margin-top: 18px;
        }

        .book-item a{
            text-transform: uppercase;
            margin: auto;
            top: 4px;
            font-family: "Qanelas",sans-serif;
        }

        @media all and (max-width : 520px) {
            #books {
                margin-top: -40px;
            }

            #booksContainer {
                padding: 20px;
                padding-top: 30px;
            }

            .book-item{
                width: 100%;
                margin-right: 0;
            }

            .book-item .image{
                height: 360px;
                overflow: hidden;
            }
        }
    </style>
@endsection

@section('content')
    <div id="books">
        <div id="booksContainer">
            <div id="pageHeader">
                <h1>Books</h1>
                <h2>
                    A carefully curated list of books for school and extra cullicular
                    learning to improve your child knowledgewise and academically.
                </h2>
            </div>

            <p id="comingSoon" class="brand-purple-color">
                The books will be ready soon, be on the lookout.
            </p>

            <div id="booksList" class="layout wrap">
                {{--@for($i = 0; $i < 7; $i++)--}}
                    <div class="book-item">
                        <div class="image">
                            <img src="{{asset('assets/images/book.jpg')}}" alt="">
                        </div>
                        <div class="description flex">
                            <h3>
                                Numbers Worksheet
                            </h3>
                            <a target="_blank" class="brand-yellow-color" style="text-decoration: underline" href="{{asset('uploads/worksheets/Worksheets-numbers.pdf')}}" download="Numbers WorkSheet">
                                Get your copy
                            </a>
                        </div>
                    </div>
                {{--@endfor--}}
            </div>
        </div>
    </div>
@endsection
