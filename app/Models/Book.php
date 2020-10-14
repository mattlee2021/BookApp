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

    public function up(){
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

        });

    //Author and Book Title columns were added in migrations 2020_10_12_0500
    
    function deleteData($id){
        DB::table('books')->where('id', '=', $id)->delete();
    }

    


    }

    public function down()
    {
        Schema::drop('books');
    }

}
