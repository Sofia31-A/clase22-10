<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuthorBook;
use App\Models\Author;
use App\Models\Book;

class AuthorBookController extends Controller
{
    public function index(){
        $books = Book::all();
        $authors = Author::all();
        $authorBooks = AuthorBook::all();
        return view('datos', compact('books', 'authors', 'authorBooks'));
    }

    public function store(Request $request){
        $authorBook = new AuthorBook();
        $authorBook->author_id = $request->author_id;
        $authorBook->book_id = $request->book_id;
        $authorBook->save();
        return redirect()->route('authors-books.index');
    }

    public function edit($id){
        $authorBook = AuthorBook::find($id);
        $books = Book::all();
        $authors = Author::all();
        return view('datos_edit', compact('authorBook', 'books', 'authors'));
    }
    
    public function update(Request $request, $id){
        $authorBook = AuthorBook::find($id);
        $authorBook->author_id = $request->author_id;
        $authorBook->book_id = $request->book_id;
        $authorBook->save();
        return redirect()->route('authors-books.index');
    }

    public function destroy($id){
        $authorBook = AuthorBook::find($id);
        $authorBook->delete();
        return redirect()->route('authors-books.index');
    }
}
