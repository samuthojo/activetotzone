<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    public function __construct() {
      $this->middleware('auth')->only(['save', 'book_form',
                                              'delete', 'edit', ]);
    }
    public function index() {
      $books = Book::orderBy('id', 'desc')->get();
      return view('books.index', [
        'books' => $books,
      ]);
    }

    //View the book in the browser
    public function view_book($id) {
      $path = Book::find($id)->book_url;
      return response()->file($path);
    }

    //Download the book
    public function download($id) {
      $path = Book::find($id)->book_url;
      return response()->download($path);
    }

    //form to add a book
    public function book_form() {
      return view('books.form');
    }

    //Store uploaded book
    public function save(Request $request) {
      Book::create([
              'title' => $request->input('title'),
              'author' => $request->input('author'),
              'date_published' => $request->input('date_published'),
              'description' => $request->input('description'),
              //---To do saving uploaded cover Image
              'cover_image' => $request->file('cover_image')->store('books'),
              //---To do saving uploaded book
              'book_url' => $request->file('book')->store('documents'),
      ]);
      $books = Book::orderBy('id', 'desc')->get();
      return view('books.index', [
        'books' => $books,
      ]);
    }

    //delete the book
    public function delete($id) {
      $book = Book::find($id);
      $book->delete(); //The book will be softDeleted
      $books = Book::orderBy('date', 'desc')->get();
      return view('books.index', [
        'books' => $books,
      ]);
    }

    //edit the book
    public function edit($id) {
      $book = Event::find($id);
      return view('books.edit_book', [
        'book' => $book,
      ]);
    }

}
