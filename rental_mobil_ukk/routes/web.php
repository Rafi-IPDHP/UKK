<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\TempatRentalController;
use App\Models\TempatRental;

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

Route::controller(AuthController::class)->group(function() {
    Route::get('/register', 'register')->name('auth.register');
    Route::get('/register-petugas', 'registerPetugas')->name('auth.registerPetugas');
    Route::post('/store', 'store')->name('auth.store');
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/auth', 'auth')->name('auth.proses');
    Route::get('logout', 'logout')->name('logout');
});

Route::get('/', [TempatRentalController::class, 'index'])->name('dashboard');
// Route::resource('/tempat-rental', TempatRentalController::class)->middleware('auth');
// Route::get('/tempat-rental', [TempatRentalController::class, 'index'])->name('tempat-rental.index')->middleware('auth');
Route::get('/tempat-rental/create', [TempatRentalController::class, 'create'])->name('tempat-rental.create')->middleware('auth');
Route::post('/tempat-rental/store', [TempatRentalController::class, 'store'])->name('tempat-rental.store')->middleware('auth');
Route::get('/tempat-rental/all', [TempatRentalController::class, 'all'])->name('tempat-rental.all')->middleware('auth');
Route::get('/tempat-rental/{id}', [TempatRentalController::class, 'show'])->name('tempat-rental.show')->middleware('auth');
Route::get('/tempat-rental/{id}/edit', [TempatRentalController::class, 'edit'])->name('tempat-rental.edit')->middleware('auth', 'can:isAdmin');
Route::put('/tempat-rental/{id}/update', [TempatRentalController::class, 'update'])->name('tempat-rental.update')->middleware('auth', 'can:isAdmin');
Route::get('tempat-rental/{id}/destroy', [TempatRentalController::class, 'destroy'])->name('tempat-rental.destroy')->middleware('auth', 'can:isAdmin');

Route::get('/tempat-rental/{id}/mobil/create', [MobilController::class, 'create'])->name('mobil.create')->middleware('auth');
Route::post('/tempat-rental/{id}/mobil', [MobilController::class, 'store'])->name('mobil.store')->middleware('auth');
Route::get('/tempat-rental/{id}/mobil/{id_mobil}/destroy', [MobilController::class, 'destroy'])->name('mobil.destroy')->middleware('auth');

Route::get('/tempat-rental/{id}/mobil/{id_mobil}/sewa/create', [PeminjamanController::class, 'create'])->name('sewa.create')->middleware('auth');
Route::post('/tempat-rental/{id}/mobil/{id_mobil}/sewa', [PeminjamanController::class, 'store'])->name('sewa.store')->middleware('auth');

Route::get('/peminjaman/{user_id}', [PeminjamanController::class, 'index'])->name('sewa.index')->middleware('auth');

Route::get('/user/{user_id}', [AuthController::class, 'user'])->name('user')->middleware('auth');

Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index')->middleware('auth');
Route::get('/pengembalian/{sewa_id}/create', [PengembalianController::class, 'create'])->name('pengembalian.create')->middleware('auth');
Route::post('/pengembalian/{sewa_id}', [PengembalianController::class, 'store'])->name('pengembalian.store')->middleware('auth');
Route::get('/pdf', [PengembalianController::class, 'createPDF']);
