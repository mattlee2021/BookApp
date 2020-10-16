<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
//Added Code from updateAuthor
use Illuminate\Http\Request;
use App\Models\Book;

//postBook

class BookController extends Controller
{
    function fetchData(){
        //$data = DB::table('books')->get(); 
        $data=Book::all();
        return $data;
    }

    function addData(Request $request) {
        //print_r($request -> input());
        if ($request->has('addToList')) {
        $book = new Book;
        $book->Title = $request->book;
        $book->Author = $request->author;
        $book->save();
        //Added Code from updateAuthor
        $data = $this->fetchData();
        View::share('data', $data);
        //return view('submittedData', ['data'=>$data]);
        return redirect()->route('mainRoute');
        }
    }

    function viewData(){
        $data = $this->fetchData();
        View::share('data', $data);
        return view('submittedData', ['data'=>$data]);
    }

     function deleteUser($id){
        $data=Book::find($id);
        $data->delete();
        return redirect()->route('mainRoute');
      }

    function editAuthor($id){

        $dataToUpdate=Book::find($id);
        return view('editAuthor', ['data'=>$dataToUpdate]);
    }

    function update(Request $request){
        $dataToUpdate=Book::find($request->id);
        $dataToUpdate->Author=$request->authorEdit;
        $dataToUpdate->save();
        return redirect()->route('mainRoute');
    }

    function bookSearch(Request $bookName){
        if ($bookName->has('searchBook')) {
            //$rowToReturn=DB::table('books')->where('Title', '=', $bookName)->get();
            $lookup=$bookName->bookLookup;
            $rowToReturn=Book::where('Title', '=', $lookup)->get();
            //return $rowToReturn;
            return view('searchedBooks', ['data'=>$rowToReturn]); 
            
        }
        //Error Handling
    }


}
