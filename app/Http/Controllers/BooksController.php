<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    protected $active_repo;

    public function __construct(ActiveTotRepo $active_repo) {
      $this->active_repo = $active_repo;
    }

    public function index() {
      $books = Book::orderBy('id', 'desc')->get();
      return view('books.index', [
        'books' => $books,
      ]);
    }

    public function book_form() {
      return view('books.form');
    }

    public function add(Request $request) {
      Book::create([
              'title' = $request->input('title'),
              'author' = $request->input('author'),
              'date_published' = $request->input('date_published'),
              'description' = $request->input('description'),
              //---To do saving uploaded cover Image
              'cover_image' = $request->file('cover_image')->store('books'),
              //---To do saving uploaded book
              'book_url' = $request->file('book')->store('documents'),
      ]);
      $books = Book::orderBy('id', 'desc')->get();
      return view('books.index', [
        'books' => $books,
      ]);
    }

    public function delete($id) {
      $book = Book::find($id);
      $book->delete(); //The book will be softDeleted
      $books = Book::orderBy('date', 'desc')->get();
      return view('books.index', [
        'books' => $books,
      ]);
    }
}
