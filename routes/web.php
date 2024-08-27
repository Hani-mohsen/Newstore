<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ProductCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductCouponController;
use App\Http\Controllers\Backend\ProductCustomerController;
use App\Http\Controllers\Backend\ProductReviewController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Frontend\FrontendController;
use Database\Seeders\ProductCouponSeeder;
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

Route::get('/', [FrontendController::class,'index'])->name('frontend.index');
Route::get('/cart', [FrontendController::class,'cart'])->name('frontend.cart');
Route::get('/checkout', [FrontendController::class,'checkout'])->name('frontend.checkout');
Route::get('/detail', [FrontendController::class,'detail'])->name('frontend.detail');
Route::get('/shop', [FrontendController::class,'shop'])->name('frontend.shop');


//admin dash
Route::get('/admin/login', [BackendController::class,'login'])->name('backend.login');
Route::get('/admin/forgetpass', [BackendController::class,'forgetpass'])->name('backend.forgetpass');
Route::get('/admin/index', [BackendController::class,'index'])->name('backend.index');


//procategory
Route::get('/admin/product-catey',[ProductCategoryController::class,'index'])->name('pro.index');
Route::get('/admin/product-create',[ProductCategoryController::class,'create'])->name('pro.create');
Route::post('/admin/product-store',[ProductCategoryController::class,'store'])->name('pro.store');
Route::get('/admin/product-edit',[ProductCategoryController::class,'edit'])->name('pro.edit');
Route::get('/admin/product-update',[ProductCategoryController::class,'index'])->name('pro.update');

Route::get('/admin/product-delete',[ProductCategoryController::class,'index'])->name('pro.delete');


//product
//Route::get('/admin/product',[ProductController::class,'index'])->name('product.index');

Route::post('products/remove-image', [ProductController::class, 'remove_image'])->name('products.remove_image');
Route::resource('products', ProductController::class);


//tag
Route::get('/admin/tag',[TagController::class,'index'])->name('tag.index');
Route::get('/admin/tag-create',[TagController::class,'create'])->name('tag.create');
Route::post('/admin/tag-store',[TagController::class,'store'])->name('tag.store');
Route::get('/admin/tag-edit/{id}',[TagController::class,'edit'])->name('tag.edit');
Route::post('/admin/tag-edit',[TagController::class,'update'])->name('tag.update');
Route::get('/admin/tag-delete/{id}',[TagController::class,'delete'])->name('tag.delete');
//

//copon
Route::resource('coupons',ProductCouponController::class,);
//
//review
Route::resource('reviews', ProductReviewController::class);

//customer
Route::resource('customer', ProductCustomerController::class);


//
Auth::routes(['verify'=>true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
