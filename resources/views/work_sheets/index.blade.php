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
            margin: auto;
        }

        #booksContentWrapper{
            padding: 0 4em;
        }

        #bookFilters{
            width: 30%;
            max-width: 230px;
            margin-right: 80px;
        }

        #bookFilters input{
            display: none;
        }

        #bookFilters .filter{
            display: block;
            padding: 12px 16px;
            padding-left: 0;
            border-bottom: 1px solid #eee;
        }

        #bookFilters .filter:before{
            content: '\f096';
            font-family: FontAwesome;
            font-style: normal;
            font-weight: normal;
            width: 20px;
            display: inline-block;
        }

        #bookFilters input:checked + .filter:before{
            content: '\f046';
            /*content: '\f14a';*/
        }

        #bookFilters h2,
        #bookFilters h3{
            font-family: "Qanelas Bold", sans-serif;
            font-weight: bold;
        }

        #booksList{
            position: relative;
            max-width: 950px;
            /*display: none;*/
            /*margin-top: 50px;*/
        }

        .book-item{
            margin-bottom: 80px;
            width: calc(33.333% - 5px);
            margin-right: 5px;
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
            /*font-family: "Qanelas Bold", sans-serif;*/
        }

        .book-item a{
            text-transform: uppercase;
            margin: auto;
            top: 4px;
            font-family: "Qanelas",sans-serif;
        }

        #booksList.is-empty:before{
            content: 'No items found, please refresh your filter';
            position: absolute;
            left: 0;
            top: 30px;
            width: 100%;
            text-align: center;
            font-size: 20px;
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
            {{--<div id="pageHeader">--}}
                {{--<h1>WorkSheets</h1>--}}
                {{--<h2>--}}
                    {{--Looking for something to keep your children occupied when they return--}}
                    {{--from school? Meet worksheets, they do exactly that.--}}
                {{--</h2>--}}
            {{--</div>--}}
            <div id="booksContentWrapper" class="layout">
                <div id="bookFilters">
                    <h2>FILTER WORKSHEETS</h2> <br><br>

                    <h3>SUBJECTS</h3>
                    <div class="subject-filters">
                        @foreach($subjects as $subject)
                            <input id="sub{{$subject->id}}" class="filter-input" type="checkbox" value="{{$subject->id}}">

                            <label class="filter" for="sub{{$subject->id}}">
                                {{$subject->name}}
                            </label>
                        @endforeach
                    </div> <br>

                    <h3>GRADES</h3>
                    <div class="grade-filters">
                        @foreach($grades as $grade)
                            <input id="grade{{$grade->id}}" type="checkbox" class="filter-input" value="{{$grade->id}}">

                            <label class="filter" for="grade{{$grade->id}}">
                                {{$grade->name}}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div id="booksList" class="flex layout wrap">
                    @foreach($work_sheets as $sheet)
                        <div class="book-item" data-subject="{{$sheet->work_sheet_subject_id}}" data-grade="{{$sheet->work_sheet_grade_id}}">
                            <div class="image">
                                <img src="{{asset('uploads/worksheets/cover_pictures/' . $sheet->picture)}}" alt="Numbers worksheets preview">
                            </div>
                            <div class="description flex">
                                <h3>
                                    {{$sheet->title}}
                                </h3>
                                <a target="_blank" class="brand-yellow-color" style="text-decoration: underline"  href="{{asset('uploads/worksheets/' . $sheet->worksheet)}}" download="{{$sheet->name}}">
                                    Get your copy
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <script>
        var filters = {
            'subjects' : [],
            'grades' : []
        };

        $(document).ready(function () {
            $('.filter-input').bind("change", function () {
                var val = parseInt($(this).val());
                var isChecked = $(this).prop('checked');
                var forSubject = $(this).parents('.subject-filters').length > 0;
                var category = forSubject ? "subjects" : "grades";


                if(isChecked){
                    filters[category].push(val);
                }else{
                    filters[category].splice(filters[category].indexOf(val), 1);
                }

                filterBooks();
            });
        });

        function filterBooks(){
            var grades = filters['grades'];
            var subs = filters['subjects'];
            $('.book-item').fadeOut();

            var count = 0;
            if(grades.length < 1 && subs.length >= 1){
                $('.book-item').each(function () {
                    var sub_id = $(this).data('subject');
                    if(subs.indexOf(sub_id) !== -1){
                        count++;
                        $(this).fadeIn();
                    }
                });
            }
            else if(subs.length < 1 && grades.length >= 1){
                $('.book-item').each(function () {
                    var grade_id = $(this).data('grade');
                    if(grades.indexOf(grade_id) !== -1){
                        count++;
                        $(this).fadeIn();
                    }
                });
            }
            else if(subs.length >= 1 && grades.length >= 1){
                $('.book-item').each(function () {
                    var sub_id = $(this).data('subject');
                    var grade_id = $(this).data('grade');
                    if(grades.indexOf(grade_id) !== -1 && subs.indexOf(sub_id) !== -1){
                        count++;
                        $(this).fadeIn();
                    }
                });
            }else{
                count = 1;
                $('.book-item').fadeIn();
            }

            if(count < 1){
                setTimeout(function(){
                    $("#booksList").addClass('is-empty');
                }, 200);
            }else{
                setTimeout(function(){
                    $("#booksList").removeClass('is-empty');
                }, 200);
            }
        }
    </script>
@endsection
