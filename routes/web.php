<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\exportController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\sortController;

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

Route::get('/', [CRUDController::class, 'viewData'])->name('mainRoute');
Route::post('/submit', [CRUDController::class, 'addData']);
Route::get('/delete/{id}', [CRUDController::class, 'deleteUser']);
Route::get('/edit/{id}', [CRUDController::class, 'editAuthor']);
Route::post('/edit', [CRUDController::class, 'update']);

Route::get('/bookSort',[sortController::class, 'bookSort'])->name('bookSort');
Route::get('/authorSort',[sortController::class, 'authorSort'])->name('authorSort');

Route::get('/bookSearch',[searchController::class, 'bookSearch']);
Route::get('/authorSearch',[searchController::class, 'authorSearch']);


Route::get('/exportCSV_Both',[exportController::class, 'exportCSV_Both'])->name('exportCSV_Both');
Route::get('/exportCSV_Auth',[exportController::class, 'exportCSV_Auth'])->name('exportCSV_Auth');
Route::get('/exportCSV_Book',[exportController::class, 'exportCSV_Book'])->name('exportCSV_Book');
Route::get('/exportXML_Both',[exportController::class, 'exportXML_Both'])->name('exportXML_Both');
Route::get('/exportXML_Auth',[exportController::class, 'exportXML_Auth'])->name('exportXML_Auth');
Route::get('/exportXML_Book',[exportController::class, 'exportXML_Book'])->name('exportXML_Book');





