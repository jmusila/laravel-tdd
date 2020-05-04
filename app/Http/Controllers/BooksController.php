<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function store(Request $request){
        
        $book = Book::create($this->validateRequest());

        return redirect($book->path());

    }

    public function update(Request $request, $id){

        $book = Book::findOrFail($id);
        $book->update($this->validateRequest());

        return redirect($book->path());
    }

    public function delete(Request $request, $id){
        
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/books');

    }

    public function validateRequest(){
        return request()->validate([
            'title' => 'required',
            'author' => 'required'
        ]);
    }
}
