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
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\Client\ClientFranchiseController;
use App\Http\Controllers\Client\ClientEraController;
use App\Http\Controllers\Client\ClientCategoryController;

use App\Livewire\Admin\DashboardLivewire;
use App\Livewire\Admin\CategoryLivewire;
use App\Livewire\Admin\DataLivewire;
use App\Livewire\Admin\EraLivewire;
use App\Livewire\Admin\FranchiseLivewire;
use App\Livewire\Admin\TagLivewire;
use App\Livewire\Admin\UserLivewire;

use App\Http\Controllers\MessageController;

Route::get('/messages', [MessageController::class, 'index']);
Route::post('/messages', [MessageController::class, 'store']);

// CLIENT SIDE
Route::get('/', [HomeController::class, 'index'])->name('beranda');

Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/era', [ClientEraController::class, 'index'])->name('era');
Route::get('/era/{category}', [ClientEraController::class, 'show'])->name('era.show');
Route::get('/era/{category}/{data}', [ClientEraController::class, 'category'])->name('era.category');
Route::get('/franchise', [ClientFranchiseController::class, 'index'])->name('franchise');
Route::get('/franchise/{category}', [ClientFranchiseController::class, 'show'])->name('franchise.show');
Route::get('/franchise/{category}/{data}', [ClientFranchiseController::class, 'category'])->name('franchise.category');
Route::get('/category', [ClientCategoryController::class, 'index'])->name('category');
Route::get('/category/{data}', [ClientCategoryController::class, 'show'])->name('category.show');

// Payment Gateway
Route::get('/midtrans', [MidtransController::class, 'createTransaction']);
Route::post('/midtrans/finish', [MidtransController::class, 'finish']);
Route::get('/paypal', [PayPalController::class, 'payWithPayPal'])->name('paypal');
Route::get('/paypal/status', [PayPalController::class, 'payPalStatus'])->name('paypal.status');

// OAuth
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback'])->name('auth.callback');

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

    // CRUD LIVEWIRE
    Route::get('/dashboards', DashboardLivewire::class)->name('dashboards');
    Route::get('/categories', CategoryLivewire::class)->name('category');
    Route::get('/datas', DataLivewire::class)->name('data');
    Route::get('/eras', EraLivewire::class)->name('era');
    Route::get('/franchises', FranchiseLivewire::class)->name('franchise');
    Route::get('/tags', TagLivewire::class)->name('tag');
    Route::get('/users', UserLivewire::class)->name('user');

    // CRUD USER
    Route::resource('user', AdminUserController::class)->only(['index', 'store', 'update', 'destroy']);

    // CRUD ERA
    Route::get('/era', [AdminEraController::class, 'index'])->name('era.index');
    Route::post('/era', [AdminEraController::class, 'store'])->name('era.store');
    Route::put('/era/{id}/update', [AdminEraController::class, 'update'])->name('era.update');
    Route::delete('/era/{id}/destroy', [AdminEraController::class, 'destroy'])->name('era.destroy');
    Route::post('/era/import', [AdminEraController::class, 'import'])->name('era.import');
    Route::get('/era/export', [AdminEraController::class, 'export'])->name('era.export');
    Route::delete('/era/destroyAll', [AdminEraController::class, 'destroyAll'])->name('era.destroyAll');
    Route::delete('/era/{id}/softDelete', [AdminEraController::class, 'softDelete'])->name('era.softDelete');
    Route::delete('/era/softDeleteAll', [AdminEraController::class, 'softDeleteAll'])->name('era.softDeleteAll');
    Route::put('/era/{id}/restore', [AdminEraController::class, 'restore'])->name('era.restore');
    Route::put('/era/restoreAll', [AdminEraController::class, 'restoreAll'])->name('era.restoreAll');

    // CRUD FRANCHISE
    Route::get('/franchise', [AdminFranchiseController::class, 'index'])->name('franchise.index');
    Route::post('/franchise', [AdminFranchiseController::class, 'store'])->name('franchise.store');
    Route::put('/franchise/{id}/update', [AdminFranchiseController::class, 'update'])->name('franchise.update');
    Route::delete('/franchise/{id}/destroy', [AdminFranchiseController::class, 'destroy'])->name('franchise.destroy');
    Route::post('/franchise/import', [AdminFranchiseController::class, 'import'])->name('franchise.import');
    Route::get('/franchise/export', [AdminFranchiseController::class, 'export'])->name('franchise.export');
    Route::delete('/franchise/destroyAll', [AdminFranchiseController::class, 'destroyAll'])->name('franchise.destroyAll');
    Route::delete('/franchise/{id}/softDelete', [AdminFranchiseController::class, 'softDelete'])->name('franchise.softDelete');
    Route::delete('/franchise/softDeleteAll', [AdminFranchiseController::class, 'softDeleteAll'])->name('franchise.softDeleteAll');
    Route::put('/franchise/{id}/restore', [AdminFranchiseController::class, 'restore'])->name('franchise.restore');
    Route::put('/franchise/restoreAll', [AdminFranchiseController::class, 'restoreAll'])->name('franchise.restoreAll');

    // CRUD CATEGORY
    Route::get('/category', [AdminCategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::put('/category/{id}/update', [AdminCategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}/destroy', [AdminCategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/category/import', [AdminCategoryController::class, 'import'])->name('category.import');
    Route::get('/category/export', [AdminCategoryController::class, 'export'])->name('category.export');
    Route::delete('/category/destroyAll', [AdminCategoryController::class, 'destroyAll'])->name('category.destroyAll');
    Route::delete('/category/{id}/softDelete', [AdminCategoryController::class, 'softDelete'])->name('category.softDelete');
    Route::delete('/category/softDeleteAll', [AdminCategoryController::class, 'softDeleteAll'])->name('category.softDeleteAll');
    Route::put('/category/{id}/restore', [AdminCategoryController::class, 'restore'])->name('category.restore');
    Route::put('/category/restoreAll', [AdminCategoryController::class, 'restoreAll'])->name('category.restoreAll');

    // CRUD TAG
    Route::get('/tag', [AdminTagController::class, 'index'])->name('tag.index');
    Route::post('/tag', [AdminTagController::class, 'store'])->name('tag.store');
    Route::put('/tag/{id}/update', [AdminTagController::class, 'update'])->name('tag.update');
    Route::delete('/tag/{id}/destroy', [AdminTagController::class, 'destroy'])->name('tag.destroy');
    Route::post('/tag/import', [AdminTagController::class, 'import'])->name('tag.import');
    Route::get('/tag/export', [AdminTagController::class, 'export'])->name('tag.export');
    Route::delete('/tag/destroyAll', [AdminTagController::class, 'destroyAll'])->name('tag.destroyAll');
    Route::delete('/tag/{id}/softDelete', [AdminTagController::class, 'softDelete'])->name('tag.softDelete');
    Route::delete('/tag/softDeleteAll', [AdminTagController::class, 'softDeleteAll'])->name('tag.softDeleteAll');
    Route::put('/tag/{id}/restore', [AdminTagController::class, 'restore'])->name('tag.restore');
    Route::put('/tag/restoreAll', [AdminTagController::class, 'restoreAll'])->name('tag.restoreAll');

    // CRUD DATA
    Route::get('/data', [AdminDataController::class, 'index'])->name('data.index');
    Route::post('/data', [AdminDataController::class, 'store'])->name('data.store');
    Route::put('/data/{id}/update', [AdminDataController::class, 'update'])->name('data.update');
    Route::delete('/data/{id}/destroy', [AdminDataController::class, 'destroy'])->name('data.destroy');
    Route::post('/data/import', [AdminDataController::class, 'import'])->name('data.import');
    Route::get('/data/export', [AdminDataController::class, 'export'])->name('data.export');
    Route::delete('/data/destroyAll', [AdminDataController::class, 'destroyAll'])->name('data.destroyAll');
    Route::delete('/data/{id}/softDelete', [AdminDataController::class, 'softDelete'])->name('data.softDelete');
    Route::delete('/data/softDeleteAll', [AdminDataController::class, 'softDeleteAll'])->name('data.softDeleteAll');
    Route::put('/data/{id}/restore', [AdminDataController::class, 'restore'])->name('data.restore');
    Route::put('/data/restoreAll', [AdminDataController::class, 'restoreAll'])->name('data.restoreAll');
  });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/{franchise}/{category}', [HomeController::class, 'show'])->name('beranda.show');