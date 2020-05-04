<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthorsController extends Controller
{
    public function store(){

        Author::create($this->validateRequest());

    }

    public function validateRequest(){
        
       return request()->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'dob' => 'required',
            'password' => 'required'
        ]);

    }
}
