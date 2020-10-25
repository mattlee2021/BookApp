<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthorAndTitleToBookTable extends Migration
{
    /// Unused File. File was not deleted because an error is thrown by php artisan 
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
/*
Schema::table('books', function (Blueprint $table) {
$table->string('Author');
$table->string('Title');
});
*/
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
/*
Schema::drop('books');
*/
}
}
