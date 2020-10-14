<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
//Added Code from updateAuthor
use Illuminate\Http\Request;
use App\Models\Book;

class postBook extends Controller
{
    function fetchData(){
        $data = DB::table('books')->get(); 
        return $data;
    }

    function addData(Request $request) {
        //print_r($request -> input());
        $book = new Book;
        $book ->Title = $request->book;
        $book->Author = $request->author;
        $book->save();
        //Added Code from updateAuthor
        $data = $this->fetchData();
        View::share('data', $data);
        //return view('submittedData', ['data'=>$data]);
        return redirect()->route('mainRoute');
    }

    function viewData(){
        $data = $this->fetchData();
        View::share('data', $data);
        return view('submittedData', ['data'=>$data]);
    }

     function deleteUser($id){

        DB::table('books')->where('id', '=', $id)->delete();
        $data=$this->fetchData();
        return redirect()->route('mainRoute');
      }
}
