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
use App\Http\Controllers\Api\MapApiController;
use App\Http\Controllers\Api\AddressApiController;

Route::post('/login', [LoginApiController::class, 'loginApi'])->name('loginApi');

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

// FILM API
Route::resource('/films', FilmApiController::class, ['only', ['index', 'store', 'show', 'edit', 'update', 'destroy']]);
Route::get('/film/{franchise}/{category}', [FilmApiController::class, 'findByFranchiseCategory']);
Route::get('/film/{franchise}/{category}/{type}/{number}', [FilmApiController::class, 'findByFranchiseCategoryNumber']);

// MAP API
Route::get('/map/{province}', [MapApiController::class, 'province'])->name('map.province');
Route::get('/map/{province}/{regency}', [MapApiController::class, 'regency'])->name('map.regency');

// ALL ADDRESS API
Route::get('provinces', [AddressApiController::class, 'getProvinces']);
Route::get('regencies/{province_id}', [AddressApiController::class, 'getRegencies']);
Route::get('districts/{regency_id}', [AddressApiController::class, 'getDistricts']);
Route::get('villages/{district_id}', [AddressApiController::class, 'getVillages']);
Route::get('address/{village_id}', [AddressApiController::class, 'getVillageCoords']);

// ADDRESS API
Route::get('province/{id}', [AddressApiController::class, 'getProvince']);
Route::get('regency/{id}', [AddressApiController::class, 'getRegency']);
Route::get('district/{id}', [AddressApiController::class, 'getDistrict']);
Route::get('village/{id}', [AddressApiController::class, 'getVillage']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [LoginApiController::class, 'logout']);
});
