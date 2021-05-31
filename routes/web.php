<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;

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
    return view('auth.login');
});

Route::get('/clear-cache-all', function() {
    Artisan::call('cache:clear');
    dd("Cache Clear All");
});

Route::get('/dashboard', [HomeController::class, 'index']);
Route::post('/registrasi', [RegistrasiController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);

## Buku
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/search', [BukuController::class, 'search']);
Route::get('/buku/create', [BukuController::class, 'create']);
Route::post('/buku', [BukuController::class, 'store']);
Route::get('/buku/edit/{buku}', [BukuController::class, 'edit']);
Route::put('/buku/edit/{buku}', [BukuController::class, 'update']);
Route::get('/buku/hapus/{buku}',[BukuController::class, 'delete']);

## Kategori
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/search', [KategoriController::class, 'search']);
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/edit/{kategori}', [KategoriController::class, 'edit']);
Route::put('/kategori/edit/{kategori}', [KategoriController::class, 'update']);
Route::get('/kategori/hapus/{kategori}',[KategoriController::class, 'delete']);

## Anggota
Route::get('/anggota', [AnggotaController::class, 'index']);
Route::get('/anggota/search', [AnggotaController::class, 'search']);
Route::get('/anggota/create', [AnggotaController::class, 'create']);
Route::post('/anggota', [AnggotaController::class, 'store']);
Route::get('/anggota/edit/{anggota}', [AnggotaController::class, 'edit']);
Route::put('/anggota/edit/{anggota}', [AnggotaController::class, 'update']);
Route::get('/anggota/hapus/{anggota}',[AnggotaController::class, 'delete']);

## Peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::get('/peminjaman/search', [PeminjamanController::class, 'search']);
Route::get('/peminjaman/create', [PeminjamanController::class, 'create']);
Route::post('/peminjaman', [PeminjamanController::class, 'store']);
Route::get('/peminjaman/edit/{peminjaman}', [PeminjamanController::class, 'edit']);
Route::put('/peminjaman/edit/{peminjaman}', [PeminjamanController::class, 'update']);
Route::get('/peminjaman/show/{peminjaman}', [PeminjamanController::class, 'show']);
Route::put('/peminjaman/edit2/{peminjaman}', [PeminjamanController::class, 'update2']);
Route::get('/peminjaman/hapus/{peminjaman}',[PeminjamanController::class, 'delete']);

## Peminjaman
Route::get('/pengembalian', [PengembalianController::class, 'index']);
Route::get('/pengembalian/search', [PengembalianController::class, 'search']);
Route::get('/pengembalian/create', [PengembalianController::class, 'create']);
Route::post('/pengembalian', [PengembalianController::class, 'store']);
Route::get('/pengembalian/edit/{pengembalian}', [PengembalianController::class, 'edit']);
Route::put('/pengembalian/edit/{pengembalian}', [PengembalianController::class, 'update']);
Route::get('/pengembalian/show/{pengembalian}', [PengembalianController::class, 'show']);
Route::put('/pengembalian/edit2/{pengembalian}', [PengembalianController::class, 'update2']);
Route::get('/pengembalian/hapus/{pengembalian}',[PengembalianController::class, 'delete']);

## Denda
Route::get('/denda', [DendaController::class, 'index']);
Route::get('/denda/search', [DendaController::class, 'search']);
Route::get('/denda/create', [DendaController::class, 'create']);
Route::post('/denda', [DendaController::class, 'store']);
Route::get('/denda/edit/{denda}', [DendaController::class, 'edit']);
Route::put('/denda/edit/{denda}', [DendaController::class, 'update']);
Route::get('/denda/hapus/{denda}',[DendaController::class, 'delete']);

## Pengaturan
Route::get('/pengaturan', [PengaturanController::class, 'index']);
Route::get('/pengaturan/search', [PengaturanController::class, 'search']);
Route::get('/pengaturan/create', [PengaturanController::class, 'create']);
Route::post('/pengaturan', [PengaturanController::class, 'store']);
Route::get('/pengaturan/edit/{pengaturan}', [PengaturanController::class, 'edit']);
Route::put('/pengaturan/edit/{pengaturan}', [PengaturanController::class, 'update']);
Route::get('/pengaturan/hapus/{pengaturan}',[PengaturanController::class, 'delete']);

## Slider
Route::get('/slider', [SliderController::class, 'index']);
Route::get('/slider/search', [SliderController::class, 'search']);
Route::get('/slider/create', [SliderController::class, 'create']);
Route::post('/slider', [SliderController::class, 'store']);
Route::get('/slider/edit/{slider}', [SliderController::class, 'edit']);
Route::put('/slider/edit/{slider}', [SliderController::class, 'update']);
Route::get('/slider/hapus/{slider}',[SliderController::class, 'delete']);

## User
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/search', [UserController::class, 'search']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/user/edit/{user}', [UserController::class, 'edit']);
Route::put('/user/edit/{user}', [UserController::class, 'update']);
Route::get('/user/hapus/{user}',[UserController::class, 'delete']);

## Password
Route::group(['middleware' => 'auth'], function () {
    Route::get('password', [PasswordController::class, 'edit'])
        ->name('user.password.edit');
     Route::patch('password', [PasswordController::class, 'update'])
        ->name('user.password.update');
});

