<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// FrontEnd 
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);

// Danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'Show_category_home']);
// thương hiệu san pham trang chu
Route::get('/thuong-hieu-san-pham/{brand_id}', [BrandProduct::class, 'Show_brand_home']);
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'Detail_product']);

// BackEnd
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'showdashboard']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);

// Category Product 
Route::get('/add-category-product', [CategoryProduct::class, 'Add_category_product']);
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'Edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'Delete_category_product']);
Route::get('/all-category-product', [CategoryProduct::class, 'All_category_product']);

Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product']);

Route::post('/save-category-product', [CategoryProduct::class, 'Save_category_product']);
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'Update_category_product']);

// Category Product 
Route::get('/add-brand-product', [BrandProduct::class, 'Add_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'Edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'Delete_brand_product']);
Route::get('/all-brand-product', [BrandProduct::class, 'All_brand_product']);

Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product']);

Route::post('/save-brand-product', [BrandProduct::class, 'Save_brand_product']);
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'Update_brand_product']);

// Product 
Route::get('/add-product', [ProductController::class, 'Add_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'Edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'Delete_product']);
Route::get('/all-product', [ProductController::class, 'All_product']);

Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);

Route::post('/save-product', [ProductController::class, 'Save_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'Update_product']);
