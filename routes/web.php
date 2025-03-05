<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\NoHandphoneController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TemplateGalleryController;
use App\Http\Controllers\TemplateHighlightController;
use App\Http\Controllers\UserController;
use App\Models\Template;
use App\Models\TemplateHighlight;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/Bisnis', [PageController::class, 'product'])->name('allproduct');

Route::get('/template', [PageController::class, 'template'])->name('alltemplate');

Route::get('/create-product', [PageController::class, 'createproduct'])->name('create.product');

Route::post('/store-product', [PageController::class, 'storeproduct'])->name('store.product');

Route::post('/order', [PageController::class, 'order'])->name('order');

Route::get('/sitemap.xml', [SitemapController::class, 'index']);

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => 'cekUser'], function () {
        Route::group(['middleware' => 'cekRole'], function () {
            Route::resource('/admin/user', UserController::class);
    
            Route::resource('/admin/template', TemplateController::class);
            Route::put('/template/editimage/{id}', [TemplateController::class, 'editimage'])->name('template.editimage');
        
            Route::resource('/admin/access', AccessController::class);
        });
    
        Route::get('/admin/premium', [AdminController::class, 'premium'])->name('premium.index');
    
        Route::resource('/admin/no-handphone', NoHandphoneController::class);
    
        Route::resource('/admin/product', ProductController::class);
        Route::put('/admin/product-order/{id}', [ProductController::class, 'productorder'])->name('product.order');
    
        Route::resource('/admin/product-gallery', ProductGalleryController::class);
    
        Route::resource('/admin/highlight', HighlightController::class);
    
        Route::resource('/admin/template-highlight', TemplateHighlightController::class);
    
        Route::resource('/admin/template-gallery', TemplateGalleryController::class);
    
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';

Route::get('/{slug}', [PageController::class, 'detail'])->name('detail');
Route::get('/template/{slug}', [PageController::class, 'templatedetail'])->name('template.detail');

