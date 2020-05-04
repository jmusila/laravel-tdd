<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function store(Request $request){

        $data = request()->validate([
            'title' => 'required',
            'author' => ''
        ]);

        Book::create($data);
    }
}
