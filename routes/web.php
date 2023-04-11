<?php

use Illuminate\Support\Facades\Route;
//Frontend
use App\Http\Controllers\Frontend\FrontendController;

//Backend
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\MainCatController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCatController;

/*
|--------------------------------------------------------------------------
| Frontend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/single', [FrontendController::class, 'single'])->name('single');

/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', [BackendController::class, 'index'])->name('dashboard');

    // Category
    Route::prefix('/category')->group(function () {
        // Main Category
        Route::get('/main', [MainCatController::class, 'index'])->name('main.category');
        Route::post('/add-main', [MainCatController::class, 'store'])->name('main.add');
        Route::patch('/update-main/{category}', [MainCatController::class, 'update'])->name('main.update');
        Route::delete('/delete-main/{category}', [MainCatController::class, 'destroy'])->name('main.delete');

        // Sub Category
        Route::get('/sub', [SubCatController::class, 'index'])->name('sub.category');
        Route::post('/add-sub', [SubCatController::class, 'store'])->name('sub.add');
        Route::patch('/update-sub/{category}', [SubCatController::class, 'update'])->name('sub.update');
        Route::delete('/delete-sub/{category}', [SubCatController::class, 'destroy'])->name('sub.delete');
    });

    Route::prefix('/product')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('product.manage');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::post('/import', [ProductController::class, 'import'])->name('product.import');
        Route::get('/export', [ProductController::class, 'export'])->name('product.export');
        Route::patch('/update/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('product.delete');
    });

    // Fallback route
    Route::fallback(function () {
        return view('backend.pages.errors.404');
    });
});

require __DIR__ . '/auth.php';
