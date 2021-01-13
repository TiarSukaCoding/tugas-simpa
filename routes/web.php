<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('login');
});



Auth::routes();
// Route::post('/register/create', 'App\Http\Controllers\Auth\RegisterController@create', 'regis');

// Route::get('toko/beli', 'App\Http\Controllers\BooksController@beli');
// Route::get('toko/books', 'App\Http\Controllers\BooksController@index');

// Route::get('toko/books/create', 'App\Http\Controllers\BooksController@create');
// Route::post('toko/books/add', 'App\Http\Controllers\BooksController@add');
// Route::get('toko/books/edit/{id}','App\Http\Controllers\BooksController@edit');
// Route::post('toko/books/update','App\Http\Controllers\BooksController@update');
// Route::get('toko/books/destroy/{id}', 'App\Http\Controllers\BooksController@destroy');

// Route::post('toko/beli_ajax/', 'App\Http\Controllers\BooksController@beli_ajax');
// Route::post('toko/beli_buku/', 'App\Http\Controllers\BooksController@beli_buku');

// Route::get('toko/datatabel', 'App\Http\Controllers\BooksController@datatabel');

// Route::get('toko/books/store', 'App\Http\Controllers\BooksController@store');




Route::get('/home/jasa', [\App\Http\Controllers\JasaController::class, 'index']);
Route::post('/home/jasa/create', [\App\Http\Controllers\JasaController::class, 'create']);
Route::get('/home/jasa/{id}/edit', [\App\Http\Controllers\JasaController::class, 'edit']);
Route::post('/home/jasa/{id}/update', [\App\Http\Controllers\JasaController::class, 'update']);
Route::post('/home/jasa/{id}/delete', [\App\Http\Controllers\JasaController::class, 'delete']);


Route::get('/home/supplier', [\App\Http\Controllers\SupplierController::class, 'index']);
Route::post('/home/supplier/create', [\App\Http\Controllers\SupplierController::class, 'create']);
Route::get('/home/supplier/{id}/edit', [\App\Http\Controllers\SupplierController::class, 'edit']);
Route::post('/home/supplier/{id}/update', [\App\Http\Controllers\SupplierController::class, 'update']);
Route::post('/home/supplier/{id}/delete', [\App\Http\Controllers\SupplierController::class, 'delete']);

Route::get('/home/proyek', [\App\Http\Controllers\ProyekController::class, 'index']);
Route::post('/home/proyek/create', [\App\Http\Controllers\ProyekController::class, 'create']);
Route::get('/home/proyek/{id}/edit', [\App\Http\Controllers\ProyekController::class, 'edit']);
Route::post('/home/proyek/{id}/update', [\App\Http\Controllers\ProyekController::class, 'update']);
Route::post('/home/proyek/{id}/delete', [\App\Http\Controllers\ProyekController::class, 'delete']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/locked', 'App\Http\Controllers\LockscreenController@locked')->name('locked');
Route::post('/unlock', 'App\Http\Controllers\LockscreenController@unlock');

// Route::post('/login/unlock', 'App\Http\Controllers\BooksController@add');
