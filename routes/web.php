<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminEraController;
use App\Http\Controllers\Admin\AdminFranchiseController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminTagController;
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

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {

  Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  // CMS ADMINITRASTOR
  Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('beranda');
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // CRUD USER
    Route::resource('user', AdminUserController::class)->only(['index', 'store', 'update', 'destroy']);

    // CRUD ERA
    Route::resource('era', AdminEraController::class)->only(['index', 'store', 'update', 'destroy']);
    // IMPORT, EXPORT, DELETE ALL ERA
    Route::post('/era/import', [AdminEraController::class, 'import'])->name('era.import');
    Route::get('/era/export', [AdminEraController::class, 'export'])->name('era.export');
    Route::delete('/era/deleteAll', [AdminEraController::class, 'destroyAll'])->name('era.destroyAll');

    // CRUD FRANCHISE
    Route::resource('franchise', AdminFranchiseController::class)->only(['index', 'store', 'update', 'destroy']);
    // IMPORT, EXPORT, DELETE ALL FRANCHISE
    Route::post('/franchise/import', [AdminFranchiseController::class, 'import'])->name('franchise.import');
    Route::get('/franchise/export', [AdminFranchiseController::class, 'export'])->name('franchise.export');
    Route::delete('/franchise/deleteAll', [AdminFranchiseController::class, 'destroyAll'])->name('franchise.destroyAll');

    // CRUD CATEGORY
    Route::resource('category', AdminCategoryController::class)->only(['index', 'store', 'update', 'destroy']);
    // IMPORT, EXPORT, DELETE ALL CATEGORY
    Route::post('/category/import', [AdminCategoryController::class, 'import'])->name('category.import');
    Route::get('/category/export', [AdminCategoryController::class, 'export'])->name('category.export');
    Route::delete('/category/deleteAll', [AdminCategoryController::class, 'destroyAll'])->name('category.destroyAll');

    // CRUD TAG
    Route::resource('tag', AdminTagController::class)->only(['index', 'store', 'update', 'destroy']);
    // IMPORT, EXPORT, DELETE ALL TAG
    Route::post('/tag/import', [AdminTagController::class, 'import'])->name('tag.import');
    Route::get('/tag/export', [AdminTagController::class, 'export'])->name('tag.export');
    Route::delete('/tag/deleteAll', [AdminTagController::class, 'destroyAll'])->name('tag.destroyAll');

    // CRUD DATA
    Route::get('/data', [AdminDataController::class, 'index'])->name('data.index');
    Route::post('/data', [AdminDataController::class, 'store'])->name('data.store');
    Route::put('/data/{id}/update', [AdminDataController::class, 'update'])->name('data.update');
    Route::delete('/data/{id}/destroy', [AdminDataController::class, 'destroy'])->name('data.destroy');
    // IMPORT, EXPORT, DELETE ALL DATA
    Route::post('/data/import', [AdminDataController::class, 'import'])->name('data.import');
    Route::get('/data/export', [AdminDataController::class, 'export'])->name('data.export');
    Route::delete('/data/deleteAll', [AdminDataController::class, 'destroyAll'])->name('data.destroyAll');
  });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/{id}', [HomeController::class, 'show'])->name('beranda.show');
