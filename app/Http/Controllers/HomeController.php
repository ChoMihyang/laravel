<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $books = [
            'Harry Potter',
            'Laravel1'
        ];
        return view('welcome', [
            'books' => $books
        ]);
    }
    public function hello(){
        return view('hello');
    }
    public function contact(){
        return view('contact');
    }
}
