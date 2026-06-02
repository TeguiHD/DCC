<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/index.html', fn () => redirect('/', 301));
Route::get('/producto.html', fn (Request $request) => $request->query('slug')
    ? redirect('/producto/'.rawurlencode((string) $request->query('slug')), 301)
    : redirect('/productos', 301));
Route::get('/servicios.html', fn (Request $request) => $request->query('cat')
    ? redirect('/categoria/'.rawurlencode((string) $request->query('cat')), 301)
    : redirect('/servicios', 301));

foreach (['productos', 'categorias', 'como-comprar', 'nosotros', 'contacto', 'terminos', 'privacidad'] as $page) {
    Route::get("/{$page}.html", fn () => redirect("/{$page}", 301));
}

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/servicios', [CatalogController::class, 'services'])->name('services');
Route::get('/productos', [CatalogController::class, 'products'])->name('products');
Route::get('/categorias', [CatalogController::class, 'categories'])->name('categories');
Route::get('/como-comprar', [PageController::class, 'howToBuy'])->name('how-to-buy');
Route::get('/nosotros', [PageController::class, 'about'])->name('about');
Route::get('/contacto', [PageController::class, 'contact'])->name('contact');
Route::get('/terminos', [PageController::class, 'terms'])->name('terms');
Route::get('/privacidad', [PageController::class, 'privacy'])->name('privacy');
Route::get('/categoria/{slug}', [CatalogController::class, 'category'])->name('category');
Route::get('/producto/{slug}', [CatalogController::class, 'product'])->name('product');
Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');
