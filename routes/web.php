<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenggunaanController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TarifController;
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
    return view('auth/login');
});

Route::group(['middleware' => ['guest']], function(){
    Route::get('login', function () {
        return view('auth/login');
    })->name('login');
    
    Route::get('register', function () {
        return view('auth/register');
    });
});

Route::group(['middleware' => ['admin']], function(){

    // Dashboard
    Route::get('dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    
    Route::get('isidashboard', function () {
        return view('pages.isidashboard');
    })->name('isidashboard');
    
    // Tarif
    Route::get('tarif', [TarifController::class, 'index'])->name('tarif');
    
    Route::get('addtarif', function () {
        return view('pages.addtarif');
    })->name('addtarif');

    // Pelanggan
    Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan');

    Route::get('addpelanggan', [PelangganController::class, 'addpelangganview'])->name('addpelanggan');
    
    // Penggunaan
    Route::get('penggunaan', [PenggunaanController::class, 'index'])->name('penggunaan');

    Route::get('addpenggunaan', [PenggunaanController::class, 'addpenggunaanview'])->name('addpenggunaan');

    // Pembayaran
    Route::get('pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');

    Route::get('addpembayaran', [PembayaranController::class, 'addpembayaranview'])->name('addpembayaran');

    // Tagihan
    Route::get('tagihan', [TagihanController::class, 'index'])->name('tagihan');

    Route::get('addtagihan', [TagihanController::class, 'addtagihanview'])->name('addtagihan');
});