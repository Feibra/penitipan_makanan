<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\CatatanBarangController;

Route::resource('toko', TokoController::class);

Route::resource('catatan', CatatanBarangController::class);

Route::get('register', [RegisterController::class, 'register'])->name('register');

Route::post('register', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('/', [LoginController::class, 'login'])->name('login');

Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth');

Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung.dashboard')->middleware('auth');

Route::get('/toko', [PengunjungController::class, 'tokoPengunjung'])->name('pengunjung.toko');

Route::get('/catatan', [PengunjungController::class, 'catatanPengunjung'])->name('pengunjung.catatan');

Route::get('/admin/catatan', [AdminController::class, 'catatanAdmin'])->name('catatan.index');

Route::get('/admin/toko', [AdminController::class, 'tokoAdmin'])->name('toko.index');
