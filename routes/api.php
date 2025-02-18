<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginApiController;
use App\Http\Controllers\Admin\AdminDataApiController;

Route::post('/login', [LoginApiController::class, 'loginApi'])->name('loginApi');

Route::resource('/', AdminDataApiController::class, ['only', ['index']]);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('data', AdminDataApiController::class, ['only', ['index', 'store', 'show', 'edit', 'update', 'destroy']]);
    Route::post('/logout', [LoginApiController::class, 'logout']);
});
