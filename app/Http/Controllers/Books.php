<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class Books extends Controller
{
    public function __construct() {
      $this->middleware('auth')->except('index');
    }

    public function index() {
      $books = Book::orderBy('id', 'desc')->get();
      return view('books.index', [
        'books' => $books,
      ]);
    }

    //form to add a book
    public function book_form() {
      return view('cms.book_add');
    }

    public function books() {
      $books = Book::orderBy('id', 'desc')->get();
      return view('cms.book', compact('books'));
    }

    public function book_details(Book $book) {
      $book->grade = $book->grade()->first()->name;
      $book->subject = $book->subject()->first()->name;
      $book->sub_subject = $book->subSubject()->first()->name;
      return view('cms.book_details', compact('book'));
    }

}
