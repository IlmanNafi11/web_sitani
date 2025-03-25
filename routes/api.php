<?php

use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\Authentication\AuthPhoneController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login'])->withoutMiddleware('api');
Route::post('validate-phone', [AuthPhoneController::class, 'checkPhone']);
Route::group([
    "middleware" => "auth:api",
], function () {
    Route::get('/user/{id}', [UserController::class, 'getUserById'])->whereNumber('id');
});

