<?php

use App\Http\Controllers\Authentication\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    "middleware" => "api",
], function () {
    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware('api');
});
