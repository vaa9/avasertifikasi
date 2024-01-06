<?php

use Illuminate\Support\Facades\Route;
use App\Models\admin;
use App\Models\buku;
use App\Models\peminjam;
use App\Models\peminjaman;
use App\Models\login;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AdminAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//saat pertama kali dibuka akan langsung masuk page login
Route::get('/', function () {
    return view('login');
});
//membuka page admin
Route::get('/admin', function () {
    return view('admin');
});
//membuka page createadmin
Route::get('/createadmin', function () {
    return view('createadmin');
});
//membuka createbook
Route::get('/createbook', function () {
    return view('createbook');
});
//membuka create peminjam
Route::get('/createpeminjam', function () {
    return view('createpeminjam');
});
//membuka create peminjaman dan menghubungkan ke modal lainnnya untuk dropdown
Route::get('/createpeminjaman', function () {
    return view('createpeminjaman')->with([
        'hasilModel' => App\Models\peminjam::all(),
        'bukus' => App\Models\buku::all()
    ]);
});
//membuka peminjam
Route::get('/peminjam', function () {
    return view('peminjam');
});
//membuka katalog buku
Route::get('/buku', function () {
    return view('buku');
});
//membuka peminjaman
Route::get('/peminjaman', function () {
    return view('peminjaman');
});
//untuk membuka dan mempassing ke controller
Route::resource('buku', BookController::class);
Route::resource('peminjam', PeminjamController::class);
Route::resource('admin', AdminController::class);
Route::resource('peminjaman', PeminjamanController::class);
//untuk mengupdate peminjaman
Route::put('/peminjaman/{id_peminjaman}', 'PeminjamanController@update')->name('peminjaman.update');
// web.php
//untuk autentikasi login
Route::get('/', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/', [AdminAuthController::class, 'adminAuthenticate'])->name('admin.login');

