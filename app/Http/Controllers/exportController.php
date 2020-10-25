<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class exportController extends Controller
{
    private function exportCSV(array $dataToExport)
    {
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
    
    function exportCSV_Both() 
    {
        $bothData=Book::all('Title','Author');
        $data=$bothData->toArray();
        $this->exportCSV($data);
    }

    function exportCSV_Auth() 
    {   
        $authData=Book::all('Author');
        $data=$authData->toArray();
        $this->exportCSV($data);
    }

    function exportCSV_Book()
    {
        $bookData=Book::all('Title');
        $data=$bookData->toArray();
        $this->exportCSV($data);

    }

    private function exportXML(array $dataToExport)
    {
        ob_start();
        $df = fopen("php://output", 'w');
        fputcsv($df, array_keys(reset($dataToExport)));
        foreach ($dataToExport as $row) {
            fputcsv($df, $row);
    }
        fclose($df);
        header('Content-Type: application/xml');
        header('Content-Disposition: attachment; filename="bookListXML.xml"');
    
    }

    function exportXML_Both() 
    {  
        $bothData=Book::all('Title','Author');
        $data=$bothData->toArray();
        $this->exportXML($data);
    }

    function exportXML_Auth() 
    {
        $authData=Book::all('Author');
        $data=$authData->toArray();
        $this->exportXML($data);
    }

    function exportXML_Book()
    {
        $bookData=Book::all('Title');
        $data=$bookData->toArray();
        $this->exportXML($data);
    }
}
