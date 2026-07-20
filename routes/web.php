<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\QuoteController as AdminQuoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Route NAMES here must match every route('...') call used across the
| Blade views (navbar, footer, home, and the pages we build next).
| Keeping names stable now means we can swap the closures below for real
| controller methods later without touching a single Blade file.
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Product catalog — ?cat= and ?feature= query params are read inside
// ProductController@index (see products.html's old JS filter logic,
// which we'll port to server-side filtering here).
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/where-to-use', [PageController::class, 'useCases'])->name('use-cases');
Route::get('/our-work', [PageController::class, 'gallery'])->name('gallery');
Route::get('/bulk-orders', [PageController::class, 'bulkOrder'])->name('bulk-order');
Route::post('/quote', [PageController::class, 'submitQuote'])->name('quote.submit');
Route::get('/about', [PageController::class, 'about'])->name('about');

/*
|--------------------------------------------------------------------------
| SEO housekeeping routes
|--------------------------------------------------------------------------
*/
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');

/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
| Login is guest-only (redirects to the dashboard if already signed
| in). Everything else under /admin requires an authenticated session
| — see bootstrap/app.php for the guest-redirect target configuration
| (unauthenticated visitors get sent to admin.login, not the default
| Laravel `login` route, which doesn't exist in this app).
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
        Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');

        Route::get('/quotes', [AdminQuoteController::class, 'index'])->name('quotes.index');
        Route::get('/quotes/{quote}', [AdminQuoteController::class, 'show'])->name('quotes.show');
        Route::patch('/quotes/{quote}/status', [AdminQuoteController::class, 'updateStatus'])->name('quotes.status');
        Route::delete('/quotes/{quote}', [AdminQuoteController::class, 'destroy'])->name('quotes.destroy');
    });
});