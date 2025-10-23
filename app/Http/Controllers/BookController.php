<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books= Book::all();
        return view('books_index')->with('books', $books);
    }

    public function store(Request $request)
    {
        $book=new Book();
        $book->title=$request->title;
        $book->genre=$request->genre;
        $book->save();
        return redirect()->route('books.index');
    }
    public function update(Request $request, $id)
    {
        $book=Book::find($id);
        $book->title=$request->title;
        $book->genre=$request->genre;
        $book->save();
        return redirect()->route('books.index');  
    }
    public function edit($id)
    {
        $book=Book::find($id);
        return view('books_edit')->with('book', $book);
    }
    public function destroy($id)
    {
        $book=Book::find($id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
