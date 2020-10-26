<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class searchController extends Controller
{
    function bookSearch(Request $bookName)
    {
        if ($bookName->has('searchBook')) {
            $validatedSearch=$bookName->validate([
                'bookLookup' => ['required']
            ]);
            $lookup=$validatedSearch['bookLookup'];
            $rowToReturn=Book::where('Title', '=', $lookup)->get();
            return view('searchedBooks', ['data'=>$rowToReturn]); 
        }
    }
        
    function authorSearch(Request $authorName)
    {
        if ($authorName->has('searchAuthor')) {   
            $validatedSearch=$authorName->validate([
                'AuthorLookup' => ['required']
            ]);
            $lookup=$validatedSearch['AuthorLookup'];
            $rowToReturn=Book::where('Author', '=', $lookup)->get();      
            return view('searchedBooks', ['data'=>$rowToReturn]); 
        }
    }
}
