<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginApiController;
use App\Http\Controllers\Api\EraApiController;
use App\Http\Controllers\Api\FranchiseApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\TagApiController;
use App\Http\Controllers\Api\DataApiController;
use App\Http\Controllers\Api\VideoApiController;

Route::post('/login', [LoginApiController::class, 'loginApi'])->name('loginApi');

Route::group(['middleware' => ['auth:sanctum']], function () {
    // API
    Route::resource('/', DataApiController::class, ['only', ['index']]);

    // ERA API
    Route::resource('/eras', EraApiController::class, ['only', ['index', 'store', 'show', 'edit', 'update', 'destroy']]);
    Route::get('/era/all', [EraApiController::class, 'all']);

    // FRANCHISE API
    Route::resource('/franchises', FranchiseApiController::class, ['only', ['index', 'store', 'show', 'edit', 'update', 'destroy']]);
    Route::get('/franchise/all', [FranchiseApiController::class, 'all']);

    // CATEGORY API
    Route::resource('/categories', CategoryApiController::class, ['only', ['index', 'store', 'show', 'edit', 'update', 'destroy']]);
    Route::get('/category/all', [CategoryApiController::class, 'all']);
    Route::get('/category/era/{era}', [CategoryApiController::class, 'findByEra']);
    Route::get('/category/franchise/{franchise}', [CategoryApiController::class, 'findByFranchise']);

    // TAG API
    Route::resource('/tags', TagApiController::class, ['only', ['index', 'store', 'show', 'edit', 'update', 'destroy']]);
    Route::get('/tag/all', [TagApiController::class, 'all']);

    // DATA API
    Route::resource('/datas', DataApiController::class, ['only', ['index', 'store', 'show', 'edit', 'update', 'destroy']]);
    Route::get('/data/{franchise}/{category}', [DataApiController::class, 'findByFranchiseCategory']);

    // VIDEO API
    Route::resource('/videos', VideoApiController::class, ['only', ['index', 'store', 'show', 'edit', 'update', 'destroy']]);
    Route::get('/video/{franchise}/{category}', [VideoApiController::class, 'findByFranchiseCategory']);
    Route::get('/video/{franchise}/{category}/{type}/{number}', [VideoApiController::class, 'findByFranchiseCategoryNumber']);

    Route::post('/logout', [LoginApiController::class, 'logout']);
});
