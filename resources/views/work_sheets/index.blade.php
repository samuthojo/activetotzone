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

        #booksContainer{
            padding-top: 80px;
            padding-bottom: 50px;
            max-width: 950px;
            margin: auto;
        }

        #booksList{
            /*display: none;*/
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
            height: calc(100% - 16px);
            display: inline-block;
            box-shadow: 0 0 8px rgba(0,0,0,0.05);
            margin: 8px;
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
                <h1>WorkSheets</h1>
                <h2>
                    Looking for something to keep your children occupied when they return
                    from school? Meet worksheets, they do exactly that.
                </h2>
            </div>
            <div id="booksList" class="layout wrap">
{{--                @for($i = 0; $i < 2; $i++)--}}
                    <div class="book-item">
                        <div class="image">
                            <img src="{{asset('uploads/worksheets/numbers.png')}}" alt="Numbers worksheets preview">
                        </div>
                        <div class="description flex">
                            <h3>
                                Numbers Worksheet
                            </h3>
                            <a target="_blank" class="brand-yellow-color" style="text-decoration: underline"  href="{{asset('uploads/worksheets/Worksheets-numbers.pdf')}}" download="Numbers WorkSheet">
                                Get your copy
                            </a>
                        </div>
                    </div>

                    <div class="book-item">
                        <div class="image">
                            <img src="{{asset('uploads/worksheets/writting.png')}}" alt="Writting worksheet preview">
                        </div>
                        <div class="description flex">
                            <h3>
                                Writting Worksheets
                            </h3>
                            <a target="_blank" class="brand-yellow-color" style="text-decoration: underline"  href="{{asset('uploads/worksheets/writting-sheets.pdf')}}" download="Writting Worksheet">
                                Get your copy
                            </a>
                        </div>
                    </div>
                {{--@endfor--}}
            </div>
        </div>
    </div>
@endsection
