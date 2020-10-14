<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\postBook;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


*/

// Format is Route::get('web extension','pathToController@ControllerMethod);

Route::get('/','App\Http\Controllers\postBook@viewData')->name('mainRoute');


Route::post('/submit', 'App\Http\Controllers\postBook@addData');
Route::get('/delete/{id}','App\Http\Controllers\postBook@deleteUser');




//Route::get('list', 'App\Http\Controllers\updateAuthor@index');
