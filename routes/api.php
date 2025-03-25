<?php

use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\Authentication\AuthPhoneController;
use App\Http\Controllers\BibitBerkualitasController;
use App\Http\Controllers\KelompokTaniController;
use App\Http\Controllers\KomoditasController;
use App\Http\Controllers\LaporanKondisiController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login'])->withoutMiddleware('api');
Route::post('validate-phone', [AuthPhoneController::class, 'checkPhone']);
Route::group([
    "middleware" => "auth:api",
], function () {
    Route::get('/user/{id}', [UserController::class, 'getUserById'])->whereNumber('id');
    Route::get('/komoditas', [KomoditasController::class, 'getAll']);
    Route::get('/komoditas/{id}', [KomoditasController::class, 'getById'])->whereNumber('id');
    Route::get('/kelompok-tani', [KelompokTaniController::class, 'getAllByPenyuluh']);
    Route::get('/kelompok-tani/{id}', [KelompokTaniController::class, 'getById']);
    Route::get('/bibit', [BibitBerkualitasController::class, 'getAll']);
    Route::post('/laporan-kondisi', [LaporanKondisiController::class, 'sendReport']);
});

