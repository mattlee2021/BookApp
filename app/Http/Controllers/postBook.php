<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class postBook extends Controller
{
    function saveData(Request $request) {
        //print_r($request -> input());
        $book = new Book;
        $book ->Title = $request->book;
        $book->Author = $request->author;
        echo $book->save();
        //return view('mainPage');

    }
}
