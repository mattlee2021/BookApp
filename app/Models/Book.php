<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";

    /*Author and Book Title columns were 
    added in database/migration/2020_10_12_043736_create_books_table.php
    */
    
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    
    }

    public function deleteData($id)
    {
        DB::table('books')->where('id', '=', $id)->delete();
    }

    public function down()
    {
        Schema::drop('books');
    }

}
