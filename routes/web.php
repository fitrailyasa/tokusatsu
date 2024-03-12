<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminEraController;
use App\Http\Controllers\Admin\AdminFranchiseController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDataController;
use App\Http\Controllers\Client\ClientEraController;
use App\Http\Controllers\Client\ClientFranchiseController;
use App\Http\Controllers\Client\ClientCategoryController;

// CLIENT SIDE
Route::get('/', [HomeController::class, 'index'])->name('beranda');

Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/era', [ClientEraController::class, 'index'])->name('era');
Route::get('/era/{id}', [ClientEraController::class, 'show'])->name('era.show');
Route::get('/era/category/{id}', [ClientEraController::class, 'category'])->name('era.category');
Route::get('/franchise', [ClientFranchiseController::class, 'index'])->name('franchise');
Route::get('/franchise/{id}', [ClientFranchiseController::class, 'show'])->name('franchise.show');
Route::get('/franchise/category/{id}', [ClientFranchiseController::class, 'category'])->name('franchise.category');
Route::get('/category', [ClientCategoryController::class, 'index'])->name('category');
Route::get('/category/{id}', [ClientCategoryController::class, 'show'])->name('category.show');

Auth::routes();

Route::middleware(['auth'])->group(function () {

  Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

  // CMS ADMINITRASTOR
  Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('beranda');
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // CRUD USER
    Route::get('/user', [AdminUserController::class, 'index'])->name('user.index');
    Route::post('/user', [AdminUserController::class, 'store'])->name('user.store');
    Route::put('/user/{id}/update', [AdminUserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}/destroy', [AdminUserController::class, 'destroy'])->name('user.destroy');
    
    // CRUD ERA
    Route::get('/era', [AdminEraController::class, 'index'])->name('era.index');
    Route::post('/era', [AdminEraController::class, 'store'])->name('era.store');
    Route::put('/era/{id}/update', [AdminEraController::class, 'update'])->name('era.update');
    Route::delete('/era/{id}/destroy', [AdminEraController::class, 'destroy'])->name('era.destroy');
    Route::post('/era/import', [AdminEraController::class, 'import'])->name('era.import');
    Route::get('/era/export', [AdminEraController::class, 'export'])->name('era.export');
    
    // CRUD FRANCHISE
    Route::get('/franchise', [AdminFranchiseController::class, 'index'])->name('franchise.index');
    Route::post('/franchise', [AdminFranchiseController::class, 'store'])->name('franchise.store');
    Route::put('/franchise/{id}/update', [AdminFranchiseController::class, 'update'])->name('franchise.update');
    Route::delete('/franchise/{id}/destroy', [AdminFranchiseController::class, 'destroy'])->name('franchise.destroy');
    Route::post('/franchise/import', [AdminFranchiseController::class, 'import'])->name('franchise.import');
    Route::get('/franchise/export', [AdminFranchiseController::class, 'export'])->name('franchise.export');
    
    // CRUD CATEGORY
    Route::get('/category', [AdminCategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::put('/category/{id}/update', [AdminCategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}/destroy', [AdminCategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/category/import', [AdminCategoryController::class, 'import'])->name('category.import');
    Route::get('/category/export', [AdminCategoryController::class, 'export'])->name('category.export');
    
    // CRUD DATA
    Route::get('/data', [AdminDataController::class, 'index'])->name('data.index');
    Route::post('/data', [AdminDataController::class, 'store'])->name('data.store');
    Route::put('/data/{id}/update', [AdminDataController::class, 'update'])->name('data.update');
    Route::delete('/data/{id}/destroy', [AdminDataController::class, 'destroy'])->name('data.destroy');
    Route::post('/data/import', [AdminDataController::class, 'import'])->name('data.import');
    Route::get('/data/export', [AdminDataController::class, 'export'])->name('data.export');
    Route::delete('/data/deleteAll', [AdminDataController::class, 'destroyAll'])->name('data.destroyAll');
  });

});

Route::get('/home', [HomeController::class, 'index'])->name('home');
