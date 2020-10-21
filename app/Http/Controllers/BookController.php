<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
    function fetchData(){
        //$data = DB::table('books')->get(); 
        $data=Book::all();
        return $data;
    }

    function viewData(){
        $data = $this->fetchData();
        //View::share('data', $data);
        return view('submittedData', ['data'=>$data]);
    }
    
    
    function addData(Request $request) {
        if ($request->has('addToList')) {
            $validatedData=$request->validate([
                'book' => ['required'],
                'author' => ['required']
            ]); // Add pop up window 
            $book = new Book;
            $book->Title = $validatedData['book'];
            $book->Author = $validatedData['author'];
            $book->save();
            $data = $this->fetchData();
            View::share('data', $data);
            //return view('submittedData', ['data'=>$data]);
            return redirect()->route('mainRoute');
            //return $request;
            //return view('Error');
            }

    }

     function deleteUser($id){
        $data=Book::find($id);
        $data->delete();
        //return view('submittedData', ['data'=>$data]);
        return redirect()->route('mainRoute');
      }

    function editAuthor($id){
        $dataToUpdate=Book::find($id);
        return view('editAuthor', ['data'=>$dataToUpdate]);
    }

    function update(Request $request){
        $dataToUpdate=Book::find($request->id);
        $validatedData = $request->validate([
            'authorEdit' => ['required']
        ]);
        //$dataToUpdate->Author=$request->authorEdit;
        $dataToUpdate->Author=$validatedData['authorEdit'];
        $dataToUpdate->save();
        return redirect()->route('mainRoute');
    }

    function bookSort(Request $request) { 
            $dataSorted=DB::table('books')->orderBy('Title','asc')->get();
            View::share('data', $dataSorted);
            return view('submittedData', ['data'=>$dataSorted]);
            //return redirect()->route('mainRoute');
            //return view('searchedBooks', ['data'=>$dataSorted]);
            //return $dataSorted;
    }

    function authorSort(Request $request) { 
        $dataSorted=DB::table('books')->orderBy('Author','asc')->get();
        //View::share('data', $dataSorted);
        return view('submittedData', ['data'=>$dataSorted]);
        //return redirect()->route('mainRoute');
        //return view('searchedBooks', ['data'=>$dataSorted]);
        //return $dataSorted;
}

}

