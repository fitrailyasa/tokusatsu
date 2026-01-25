<?php

use App\Models\Video;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
  ProfileController,
  HomeController,
  PayPalController,
  MidtransController,
  DownloadController
};

use App\Http\Controllers\Admin\{
  AdminDashboardController,
  AdminUserController,
  AdminRoleController,
  AdminProviderAccountController,
  AdminEraController,
  AdminFranchiseController,
  AdminCategoryController,
  AdminTagController,
  AdminDataController,
  AdminVideoController,
  AdminVideoCommentController,
  AdminVideoReactController,
  AdminVideoReportController,
};

use App\Livewire\Admin\{
  DashboardLivewire,
  CategoryLivewire,
  DataLivewire,
  EraLivewire,
  FranchiseLivewire,
  TagLivewire,
  UserLivewire,
};

use App\Http\Controllers\Client\{
  ClientVideoController,
  ClientHistoryController,
  ClientBookmarkController,
};

use App\Http\Controllers\Auth\ProviderController;

// --- PUBLIC ROUTES ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/offline', 'offline')->name('offline');
Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy');
Route::view('/terms-conditions', 'terms-conditions')->name('terms-conditions');
Route::get('/sitemap.xml', fn() => response()->file(public_path('sitemap.xml')));
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/history', [ClientHistoryController::class, 'index'])->name('history');
Route::get('/bookmark', [ClientBookmarkController::class, 'index'])->name('bookmark');
Route::get('/gallery/{franchise}/{category}', [HomeController::class, 'show'])->name('gallery.show');

Route::controller(ClientVideoController::class)->prefix('video')->name('video.')->group(function () {
  Route::get('/', 'index')->name('index');
  Route::get('/{category}', 'category')->name('category');
  Route::get('/{franchise}/{category}', 'show')->name('show');
  Route::get('/{franchise}/{category}/{type}/{number}', 'watch')->name('watch');
  Route::post('/report', 'report')->middleware('throttle:5,10')->name('report');
  Route::post('/{video}/react', 'react')->middleware(['auth', 'throttle:5,10'])->name('react');
  Route::post('/{video}/comment', 'comment')->middleware(['auth', 'throttle:5,10'])->name('comment');
});

Route::get('/download/{token}', [DownloadController::class, 'handle'])->name('video.download');

// Payment
Route::controller(MidtransController::class)->group(function () {
  Route::get('/midtrans', 'createTransaction');
  Route::post('/midtrans/finish', 'finish');
});

Route::controller(PayPalController::class)->group(function () {
  Route::get('/paypal', 'payWithPayPal')->name('paypal');
  Route::get('/paypal/status', 'payPalStatus')->name('paypal.status');
});

// OAuth
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect'])->name('provider.redirect');
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback'])->name('provider.callback');

require __DIR__ . '/auth.php';

// --- AUTHENTICATED ROUTES ---
Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

  Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', 'edit')->name('edit');
    Route::patch('/', 'update')->name('update');
    Route::delete('/', 'destroy')->name('destroy');
  });

  Route::post('/auth/{provider}/disconnect', [ProviderController::class, 'disconnect'])->name('provider.disconnect');

  // --- ADMIN PANEL (CMS) ---
  Route::middleware('verified')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Livewire Routes
    Route::get('/dashboards', DashboardLivewire::class)->name('dashboards');
    Route::get('/categories', CategoryLivewire::class)->name('category');
    Route::get('/datas', DataLivewire::class)->name('data');
    Route::get('/eras', EraLivewire::class)->name('era');
    Route::get('/franchises', FranchiseLivewire::class)->name('franchise');
    Route::get('/tags', TagLivewire::class)->name('tag');
    Route::get('/users', UserLivewire::class)->name('user');

    Route::resource('user', AdminUserController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('role', AdminRoleController::class)->only(['index', 'store', 'update', 'destroy']);

    $extendedResources = [
      'era' => AdminEraController::class,
      'franchise' => AdminFranchiseController::class,
      'category' => AdminCategoryController::class,
      'data' => AdminDataController::class,
      'video' => AdminVideoController::class,
      'tag' => AdminTagController::class,
    ];

    foreach ($extendedResources as $name => $controller) {
      Route::controller($controller)->prefix($name)->name("$name.")->group(function () use ($name, $controller) {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::patch('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        Route::delete('/destroyAll', 'destroyAll')->name('destroyAll');

        if (method_exists($controller, 'softDelete')) {
          Route::delete('/{id}/softDelete', 'softDelete')->name('softDelete');
          Route::delete('/softDeleteAll', 'softDeleteAll')->name('softDeleteAll');
          Route::put('/{id}/restore', 'restore')->name('restore');
          Route::put('/restoreAll', 'restoreAll')->name('restoreAll');
        }

        Route::post('/import', 'import')->name('import');
        Route::get('/exportExcel', 'exportExcel')->name('exportExcel');
        Route::get('/exportPDF', 'exportPDF')->name('exportPDF');
        Route::put('/{id}/toggle-status', 'toggleStatus')->name('toggleStatus');
      });
    }

    // Admin Interaction Management
    $interactions = [
      'video-comment' => AdminVideoCommentController::class,
      'video-react' => AdminVideoReactController::class,
      'video-report' => AdminVideoReportController::class,
    ];

    foreach ($interactions as $prefix => $controller) {
      Route::controller($controller)->prefix($prefix)->name("$prefix.")->group(function () {
        Route::get('/', 'index')->name('index');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        Route::delete('/destroyAll', 'destroyAll')->name('destroyAll');
      });
    }

    // Provider Account Management
    Route::controller(AdminProviderAccountController::class)->prefix('auth/provider')->name('auth.provider.')->group(function () {
      Route::get('/', 'index')->name('index');
      Route::get('/login', 'login')->name('login');
      Route::get('/callback', 'callback')->name('callback');
      Route::prefix('{email}')->group(function () {
        Route::put('/account-status', 'accountStatus')->name('accountStatus');
        Route::get('/files', 'files')->name('files');
        Route::get('/export', 'exportExcel')->name('export');
        Route::post('/upload', 'upload')->name('upload');
        Route::post('/clone', 'cloneFile')->name('clone');
        Route::put('/files/{fileId}/rename', 'renameFile')->name('rename');
        Route::put('/files/{fileId}/toggle-status', 'toggleStatus')->name('toggleStatus');
        Route::delete('/files/{fileId}', 'delete')->name('delete');
        Route::get('/logout', 'logout')->name('logout');
      });
    });
  });
});

// SEO Friendly Slug Redirect
Route::get('/{slug}', function ($slug) {
  $cleanSlug = preg_replace('/(-sub-[a-zA-Z0-9]+|-dub)$/', '', $slug);
  $video = Video::where('slug', $cleanSlug)->firstOrFail();

  return redirect()->route('video.watch', [
    'franchise' => $video->category->franchise->slug,
    'category'  => $video->category->slug,
    'type'      => $video->type,
    'number'    => $video->number,
  ], 301);
})->where('slug', '[A-Za-z0-9\-]+')->name('video.slug');
