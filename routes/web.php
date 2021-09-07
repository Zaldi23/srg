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

Route::get('/', function () {
    return view('toko.index');
});

Route::get('/berita', function () {
    return view('berita.index');
});
Route::get('/detail', function () {
    return view('berita.detail');
});



Route::get('/berandalpk', 'HomeController@berandalpk');

Route::get('login', [AuthController::class, 'show_login_form'])->name('login');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('pengelola-gudang-info', 'UserInfoController@jsonInformasiUntukPengelolaGudang')->name('json.pengelola.gudang.info');

Route::get('beranda', [HomeController::class, 'beranda'])->name('beranda');

Route::get('get-desa-by-kecamatan/{id}', 'DesaController@getDesaByKecamatan')->name('get-desa-by-kecamatan');

Route::resource('komoditas', KomoditasController::class);
Route::post('komoditas-penggudangan', 'KomoditasController@penggudangan')->name('komoditas.penggudangan');
Route::get('komoditas/get-detail-kategori/{id}', 'KomoditasController@getDetailKategoriKomoditas');
Route::get('json-komoditas', 'KomoditasController@jsonKomoditas')->name('json.komoditas');
Route::get('json-komoditas/{id}', 'KomoditasController@getKomoditasById');

Route::resource('petani', PetaniController::class);
Route::get('json-petani', 'PetaniController@jsonPetani')->name('json.petani');
Route::get('json-petani/{id}', 'PetaniController@jsonPetaniDetail')->name('json.petani.detail');

Route::resource('kelompok-tani', KelompokTaniController::class);
Route::get('json-kelompok-tani', 'KelompokTaniController@jsonKelompokTani')->name('json.kelompok.tani');
Route::get('json-kelompok-tani/{id}', 'KelompokTaniController@jsonKelompokTaniDetail')->name('json.kelompok.tani.detail');

Route::resource('gudang', GudangController::class);
Route::get('json-gudang', 'GudangController@jsonGudang')->name('json.gudang');
Route::get('json-gudang/{id}', 'GudangController@jsonGudangDetail')->name('json.gudang.detail');
Route::post('gudang/manage-komoditas', 'KomoditasController@manage')->name('gudang.manage');

Route::resource('kecamatan', KecamatanController::class);
Route::get('json-kecamatan', 'KecamatanController@jsonKecamatan')->name('json.kecamatan');
Route::get('json-desa-by-kecamatan/{id}', 'KecamatanController@jsonDesaByKecamatan')->name('json.desa.by.kecamatan');

Route::resource('desa', DesaController::class);

Route::resource('jenis-cabai', JenisCabaiController::class);

Route::get('gudang-desa/{desa_id}', 'GudangController@getGudangByDesa')->name('gudang.desa');