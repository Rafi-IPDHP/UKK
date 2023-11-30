<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenyewaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.dashboard');
})->name('auth.dashboard');

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/auth', 'auth')->name('auth.proses');
    Route::get('logout', 'logout')->name('logout');
});

Route::get('/login-penyewa', [PenyewaController::class, 'login'])->name('penyewa.login');

Route::group(['middleware' => ['auth:penyewa']], function() {
    Route::post('/auth-penyewa', [PenyewaController::class, 'auth'])->name('penyewa.auth');
});

Route::resource('/penyewa', PenyewaController::class);
