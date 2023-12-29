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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
    // Route::resource('user', AdminUserController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
    // Route::resource('era', AdminEraController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
    // Route::resource('franchise', AdminFranchiseController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
    // Route::resource('category', AdminCategoryController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
    // Route::resource('data', AdminDataController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
    Route::get('/user', [AdminUserController::class, 'index'])->name('user.index');
    Route::post('/user', [AdminUserController::class, 'store'])->name('user.store');
    Route::put('/user/{id}/update', [AdminUserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}/destroy', [AdminUserController::class, 'destroy'])->name('user.destroy');
    Route::get('/era', [AdminEraController::class, 'index'])->name('era.index');
    Route::post('/era', [AdminEraController::class, 'store'])->name('era.store');
    Route::put('/era/{id}/update', [AdminEraController::class, 'update'])->name('era.update');
    Route::delete('/era/{id}/destroy', [AdminEraController::class, 'destroy'])->name('era.destroy');
    Route::get('/franchise', [AdminFranchiseController::class, 'index'])->name('franchise.index');
    Route::post('/franchise', [AdminFranchiseController::class, 'store'])->name('franchise.store');
    Route::put('/franchise/{id}/update', [AdminFranchiseController::class, 'update'])->name('franchise.update');
    Route::delete('/franchise/{id}/destroy', [AdminFranchiseController::class, 'destroy'])->name('franchise.destroy');
    Route::get('/category', [AdminCategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::put('/category/{id}/update', [AdminCategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}/destroy', [AdminCategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/data', [AdminDataController::class, 'index'])->name('data.index');
    Route::post('/data', [AdminDataController::class, 'store'])->name('data.store');
    Route::put('/data/{id}/update', [AdminDataController::class, 'update'])->name('data.update');
    Route::delete('/data/{id}/destroy', [AdminDataController::class, 'destroy'])->name('data.destroy');
  });

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
