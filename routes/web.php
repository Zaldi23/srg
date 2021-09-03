<?php

use App\Http\Controllers\KomoditasController;
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

Route::get('/','HomeController@home');
Route::get('/beranda','HomeController@beranda');
Route::get('/berandalpk','HomeController@berandalpk');

Route::resource('komoditas', '\App\Http\Controllers\KomoditasController');
Route::get('komoditas/get-detail-kategori/{id}', [KomoditasController::class, 'getDetailKategoriKomoditas']);
Route::get('/pengelola','KomoditasController@pengelola');

