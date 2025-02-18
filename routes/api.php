<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginApiController;
use App\Http\Controllers\Admin\AdminDataApiController;
use App\Http\Controllers\Api\DataApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\EraApiController;
use App\Http\Controllers\Api\FranchiseApiController;
use App\Http\Controllers\Api\TagApiController;

Route::post('/login', [LoginApiController::class, 'loginApi'])->name('loginApi');

Route::resource('/', DataApiController::class, ['only', ['index']]);
Route::resource('/datas', DataApiController::class, ['only', ['index']]);
Route::resource('/categories', CategoryApiController::class, ['only', ['index']]);
Route::resource('/eras', EraApiController::class, ['only', ['index']]);
Route::resource('/franchises', FranchiseApiController::class, ['only', ['index']]);
Route::resource('/tags', TagApiController::class, ['only', ['index']]);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('data', AdminDataApiController::class, ['only', ['index', 'store', 'show', 'edit', 'update', 'destroy']]);
    Route::post('/logout', [LoginApiController::class, 'logout']);
});
