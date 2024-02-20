<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\AuthUserController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\ProductPageController;
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

//Route::get('/', function () {
//    return inertia('Welcome');
//});

//Route::get('/', function () {
//    return inertia('Admin/Dashboard');
//});

//Home Page
Route::get('/user-register', [AuthUserController::class, 'register']);
Route::post('/user-register-store', [AuthUserController::class, 'userRegisterStore']);
Route::get('/user-login', [AuthUserController::class, 'login']);

Route::get('/', [HomePageController::class, 'index']);
Route::get('/product', [ProductPageController::class, 'product']);
Route::get('/product-details', [ProductPageController::class, 'productDetails']);



//Admin
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/admin-login', [AuthController::class, 'loginCheck']);
Route::middleware(['auth', 'checkRole:1'])->group(callback: function () {
//Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//Logout
    Route::get('/admin-logout', [AuthController::class, 'logout']);
//Slider
    Route::get('/slider-show', [SliderController::class, 'index'])->name('slider.show');
    Route::get('/slider-create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider-store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/slider/{id}/update', [SliderController::class, 'update'])->name('slider.update');
    Route::post('/slider/{id}/delete', [SliderController::class, 'delete'])->name('slider.delete');

//Brand
    Route::get('/brand-show', [BrandController::class,'index'])->name('brand.show');
    Route::get('/brand-create', [BrandController::class,'create'])->name('brand.create');
    Route::post('/brand-store', [BrandController::class,'store'])->name('brand.store');
    Route::get('/brand/{id}/edit', [BrandController::class,'edit'])->name('brand.edit');
    Route::post('/brand/{id}/update', [BrandController::class,'update'])->name('brand.update');
    Route::post('/brand/{id}/delete', [BrandController::class,'delete'])->name('brand.delete');

//Category
    Route::get('/category-show', [CategoryController::class,'index'])->name('category.show');
    Route::get('/category-create', [CategoryController::class,'create'])->name('category.create');
    Route::post('/category-store', [CategoryController::class,'store'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/{id}/update', [CategoryController::class,'update'])->name('category.update');
    Route::post('/category/{id}/delete', [CategoryController::class,'delete'])->name('category.delete');

//Product
    Route::get('/product-show', [ProductController::class,'index'])->name('product.show');
    Route::get('/product-create', [ProductController::class,'create'])->name('product.create');
    Route::post('/product-store', [ProductController::class,'store'])->name('product.store');
    Route::get('/product/{id}/edit', [ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/{id}/update', [ProductController::class,'update'])->name('product.update');
    Route::post('/product/{id}/delete', [ProductController::class,'delete'])->name('product.delete');

});


