<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function store(Request $request){
        
        Book::create($this->validateRequest());

    }

    public function update(Request $request, $id){

        $book = Book::findOrFail($id);

        $book->update($this->validateRequest());
    }

    public function delete(Request $request, $id){
        
        $book = Book::findOrFail($id);
        $book->delete();

    }

    public function validateRequest(){
        return request()->validate([
            'title' => 'required',
            'author' => 'required'
        ]);
    }
}
