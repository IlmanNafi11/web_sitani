<?php

use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\Authentication\AuthPhoneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login'])->withoutMiddleware('api');
Route::post('validate-phone', [AuthPhoneController::class, 'checkPhone']);

Route::group([
    "middleware" => "api",
], function () {

});

