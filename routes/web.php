<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function ()
{
    return view('toko.index');
});
Route::get('/beranda',[HomeController::class, 'beranda']);
Route::get('/berandalpk','HomeController@berandalpk');

Route::get('login', [AuthController::class, 'show_login_form'])->name('login');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::resource('komoditas', KomoditasController::class);
Route::get('komoditas/get-detail-kategori/{id}', 'KomoditasController@getDetailKategoriKomoditas');

