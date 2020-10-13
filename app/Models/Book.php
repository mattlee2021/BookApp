<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Schema\Blueprint;
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


    }

    public function down()
    {
        Schema::drop('books');
    }

}
