<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;

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