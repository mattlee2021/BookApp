<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
//Added Code from updateAuthor
use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
    function fetchData(){
        //$data = DB::table('books')->get(); 
        $data=Book::all();
        return $data;
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
            //Added Code from updateAuthor
            $data = $this->fetchData();
            View::share('data', $data);
            //return view('submittedData', ['data'=>$data]);
            return redirect()->route('mainRoute');
            //return $request;
            //return view('Error');
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

    function bookSearch(Request $bookName){
        if ($bookName->has('searchBook')) {
            $lookup=$bookName->bookLookup;
            $rowToReturn=Book::where('Title', '=', $lookup)->get();
            return view('searchedBooks', ['data'=>$rowToReturn]); 
        }
    }
        
    function authorSearch(Request $authorName){
        if ($authorName->has('searchAuthor')) {   //Button name
            $lookup=$authorName->AuthorLookup;
            $rowToReturn=Book::where('Author', '=', $lookup)->get();      
            
            return view('searchedBooks', ['data'=>$rowToReturn]); 
            }
    }

    function bookSort(Request $request) { 
            $dataSorted=DB::table('books')->orderBy('Title','asc')->get();
            //View::share('data', $dataSorted);
            //return view('submittedData', ['data'=>$dataSorted]);
            //return redirect()->route('mainRoute');
            return view('searchedBooks', ['data'=>$dataSorted]);
            //return $dataSorted;
    }

    function authorSort(Request $request) { 
        $dataSorted=DB::table('books')->orderBy('Author','asc')->get();
        //View::share('data', $dataSorted);
        //return view('submittedData', ['data'=>$dataSorted]);
        //return redirect()->route('mainRoute');
        return view('searchedBooks', ['data'=>$dataSorted]);
        //return $dataSorted;
}
// 3 Different cases and if statements 

    private function toCSV(array $dataToExport){
            
            ob_start();
            $df = fopen("php://output", 'w');
            fputcsv($df, array_keys(reset($dataToExport)));
            foreach ($dataToExport as $row) {
                fputcsv($df, $row);
            }
            fclose($df);
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename="bookListCSV.csv"');
            
    }

    function exportCSV_Both() {
            $bothData=Book::all('Title','Author');
            $data=$bothData->toArray();
            $this->toCSV($data);
}

    function exportCSV_Auth() {
            $authData=Book::all('Author');
            $data=$authData->toArray();
            $this->toCSV($data);
    }

    function exportCSV_Book(){
            $bookData=Book::all('Title');
            $data=$bookData->toArray();
            $this->toCSV($data);

    }

}
