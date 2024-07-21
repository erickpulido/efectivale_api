<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\RequestController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    '/users' => UserController::class,
    '/requests' => RequestController::class,
]);

Route::controller(AuthController::class)
    ->group(function () {
        Route::post('/authenticate', 'authenticate');
        Route::post('/logout', 'logout');
    });
