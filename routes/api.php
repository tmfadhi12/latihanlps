<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    PelangganController,
    PembayaranController,
    PenggunaanController,
    TagihanController,
    TarifController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/bikinadminbuatjadiadminwow', [AuthController::class, 'registerAdmin']);
Route::post('/login', [AuthController::class, 'login']);

// Tarif
Route::post('/add-tarif', [TarifController::class, 'addtarif']);

// Pelanggan
Route::post('/add-pelanggan', [PelangganController::class, 'addpelanggan']);

//Penggunaan
Route::post('/add-penggunaan', [PenggunaanController::class, 'addpenggunaan']);


//Tagihan
Route::post('/add-tagihan', [TagihanController::class, 'addtagihan']);

// Pembayaran
Route::post('/add-pembayaran', [PembayaranController::class, 'addpembayaran']);