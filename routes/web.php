<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

//Route::get('/','App\Http\Controllers\BookController@viewData')->name('mainRoute');
//Route::post('/submit', 'App\Http\Controllers\BookController@addData');
//Route::get('/delete/{id}','App\Http\Controllers\BookController@deleteUser');
//Route::get('/edit/{id}','App\Http\Controllers\BookController@editAuthor');
//Route::post('/edit', 'App\Http\Controllers\BookController@update');

Route::get('/', [BookController::class, 'viewData'])->name('mainRoute');
Route::post('/submit', [BookController::class, 'addData']);
Route::get('/delete/{id}', [BookController::class, 'deleteUser']);
Route::get('/edit/{id}', [BookController::class, 'editAuthor']);
Route::post('/edit', [BookController::class, 'update']);
Route::get('/bookSearch',[BookController::class, 'bookSearch']);
Route::get('/authorSearch',[BookController::class, 'authorSearch']);
Route::get('/bookSort',[BookController::class, 'bookSort'])->name('bookSort');
Route::get('/authorSort',[BookController::class, 'authorSort'])->name('authorSort');




