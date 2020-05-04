<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function store(Request $request){

        $data = request()->validate([
            'title' => 'required',
            'author' => 'required'
        ]);

        Book::create($data);
    }

    public function update(Request $request, $id){

        $data = request()->validate([
            'title' => 'required',
            'author' => 'required'
        ]);

        $book = Book::findOrFail($id);

        $book->update($data);
    }
}
