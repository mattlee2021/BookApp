<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class sortController extends Controller
{
    function bookSort(Request $request) 
    { 
        $dataSorted=DB::table('books')->orderBy('Title','asc')->get();
        View::share('data', $dataSorted);
        return view('mainPage', ['data'=>$dataSorted]);
    }

    function authorSort(Request $request) 
    { 
        $dataSorted=DB::table('books')->orderBy('Author','asc')->get(); 
        return view('mainPage', ['data'=>$dataSorted]);
    }
}
