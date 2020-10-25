<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Book;


class CRUDController extends Controller
{
    function viewData()
    {
        $data = Book::all();
        return view('submittedData', ['data'=>$data]);
    }
    
    
    function addData(Request $request) 
    {
        if ($request->has('addToList')) {
            $validatedData=$request->validate([
                'book' => ['required'],
                'author' => ['required']
            ]); 
            $book = new Book;
            $book->Title = $validatedData['book'];
            $book->Author = $validatedData['author'];
            $book->save();
            $data = Book::all();
            View::share('data', $data);
            return redirect()->route('mainRoute');
        }

    }

     function deleteUser($id)
     {
        $data=Book::find($id);
        $data->delete();
        //return view('submittedData', ['data'=>$data]);
        return redirect()->route('mainRoute');
      }

    function editAuthor($id)
    {
        $dataToUpdate=Book::find($id);
        return view('editAuthor', ['data'=>$dataToUpdate]);
    }

    function update(Request $request)
    {
        $dataToUpdate=Book::find($request->id);
        $validatedData = $request->validate([
            'authorEdit' => ['required']
        ]);
        //$dataToUpdate->Author=$request->authorEdit;
        $dataToUpdate->Author=$validatedData['authorEdit'];
        $dataToUpdate->save();
        return redirect()->route('mainRoute');
    }

}

