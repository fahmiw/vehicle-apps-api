<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\KendaraanController;

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

Route::post("register", [UserController::class, "register"]);
Route::post("login", [UserController::class, "login"]);

Route::group(["middleware" => ["auth:api"]], function(){
    Route::get("logout", [UserController::class, "logout"]);
    Route::post("kendaraan/add", [KendaraanController::class, "addKendaraan"]);
    Route::get("kendaraan/stok", [KendaraanController::class, "stokKendaraan"]);
    Route::post("kendaraan/penjualan", [KendaraanController::class, "penjualan"]);
    Route::get("kendaraan/laporan-penjualan/{id}", [KendaraanController::class, "laporanPenjualan"]);
});
    
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
