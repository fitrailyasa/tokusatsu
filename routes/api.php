<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginApiController;
use App\Http\Controllers\Api\EraApiController;
use App\Http\Controllers\Api\FranchiseApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\TagApiController;
use App\Http\Controllers\Api\DataApiController;
use App\Http\Controllers\Api\FilmApiController;

Route::post('/login', [LoginApiController::class, 'loginApi'])->name('loginApi');

// API
Route::resource('/', DataApiController::class, ['only', ['index']]);
Route::get('/{franchise}/{category}', [DataApiController::class, 'findByFranchiseCategory']);

// ERA API
Route::resource('/eras', EraApiController::class, ['only', ['index', 'store', 'show', 'edit', 'update', 'destroy']]);

// FRANCHISE API
Route::resource('/franchises', FranchiseApiController::class, ['only', ['index', 'store', 'show', 'edit', 'update', 'destroy']]);

// CATEGORY API
Route::resource('/categories', CategoryApiController::class, ['only', ['index', 'store', 'show', 'edit', 'update', 'destroy']]);
Route::get('/categories/era/{era}', [CategoryApiController::class, 'findByEra']);
Route::get('/categories/franchise/{franchise}', [CategoryApiController::class, 'findByFranchise']);

// TAG API
Route::resource('/tags', TagApiController::class, ['only', ['index', 'store', 'show', 'edit', 'update', 'destroy']]);

// DATA API
Route::resource('/datas', DataApiController::class, ['only', ['index', 'store', 'show', 'edit', 'update', 'destroy']]);
Route::get('/datas/{franchise}/{category}', [DataApiController::class, 'findByFranchiseCategory']);

// FILM API
Route::resource('/films', FilmApiController::class, ['only', ['index', 'store', 'show', 'edit', 'update', 'destroy']]);
Route::get('/films/{franchise}/{category}/{number}', [FilmApiController::class, 'findByFranchiseCategoryNumber']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [LoginApiController::class, 'logout']);
});
