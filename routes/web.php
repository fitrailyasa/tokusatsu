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
use App\Http\Controllers\Client\ClientCategoryController;
use App\Http\Controllers\Client\ClientDataController;

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

Route::get('/era', [ClientEraController::class, 'index'])->name('era');
Route::get('/era/{id}', [ClientEraController::class, 'show'])->name('era.show');
Route::get('/category', [ClientCategoryController::class, 'index'])->name('category');
Route::get('/category/{id}', [ClientCategoryController::class, 'show'])->name('category.show');
Route::get('/data', [ClientDataController::class, 'index'])->name('data');

Auth::routes();

Route::middleware(['auth'])->group(function () {

  Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
  Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

  // CMS ADMINITRASTOR
  Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function () {
      Route::get('/', [HomeController::class, 'index'])->name('beranda');
      Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
      Route::resource('user', AdminUserController::class);
      Route::resource('era', AdminEraController::class);
      Route::resource('franchise', AdminFranchiseController::class);
      Route::resource('category', AdminCategoryController::class);
      Route::resource('data', AdminDataController::class);
    });

});
