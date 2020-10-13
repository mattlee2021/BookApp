<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class updateAuthor extends Controller
{
    function index() {
        $data = DB::table('books')->get(); 
        View::share('data', $data);
        return view('submittedData', ['data'=>$data]);
    }
}
