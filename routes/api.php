<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginApiController;
use App\Http\Controllers\Admin\AdminDataApiController;

// Route::get('/login', [LoginApiController::class, 'loginApi'])->name('getLoginApi');
Route::post('/login', [LoginApiController::class, 'loginApi'])->name('loginApi');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('data', AdminDataApiController::class, ['only', ['index', 'store', 'edit', 'update', 'destroy']]);
    Route::post('/logout', [LoginApiController::class, 'logout']);
});
