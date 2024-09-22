<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;

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


// BackEnd
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'showdashboard']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);

//Category Product 
Route::get('/add-category-product', [CategoryProduct::class, 'Add_category_product']);
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'Edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'Delete_category_product']);
Route::get('/all-category-product', [CategoryProduct::class, 'All_category_product']);

Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product']);

Route::post('/save-category-product', [CategoryProduct::class, 'Save_category_product']);
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'Update_category_product']);

//Category Product 
Route::get('/add-brand-product', [BrandProduct::class, 'Add_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'Edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'Delete_brand_product']);
Route::get('/all-brand-product', [BrandProduct::class, 'All_brand_product']);

Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product']);

Route::post('/save-brand-product', [BrandProduct::class, 'Save_brand_product']);
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'Update_brand_product']);
