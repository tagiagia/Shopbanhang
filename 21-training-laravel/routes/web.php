<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\Front;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\danhmucbaivietController;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\Front\HomeController;
// use App\Http\Controllers\BaivietController;
// use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\DonHangController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[Front\HomeController::class,'index']);
// login admin
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('/ad/logout',[AdminController::class,'logout']);
Route::get('/ad/login_admin',[AdminController::class,'index']);
Route::post('/ad/admin-dashboard',[AdminController::class,'dashboard']);

//Admin
Route::get('/ad/all_admin',[AdminController::class,'all_admin']);
//xoa admin
Route::get('/ad/delete_admin/{id}',[AdminController::class,'delete_admin']);
//Tim kiem admin
Route::post('/ad/timkiemAdmin',[AdminController::class,'searchAdmin']);


 //category_product_them
 Route::get('/ad/add_category_product',[CategoryProduct::class,'add_category_product']);
 Route::get('/ad/all_category_product',[CategoryProduct::class,'all_category_product']);
 Route::post('/ad/saveDM',[CategoryProduct::class,'save_category_product']);
//category_all_tick_hien thi
 Route::get('/ad/unactive-category-product/{category_product_id}',[CategoryProduct::class,'unactive_category_product']);
 Route::get('/ad/active-category-product/{category_product_id}',[CategoryProduct::class,'active_category_product']); 
 //category_update
 Route::get('/ad/edit_category_product/{category_product_id}',[CategoryProduct::class,'edit_category_product']);
 //xoa danh muc
 Route::get('/ad/delete_category_product/{category_product_id}',[CategoryProduct::class,'delete_category_product']);
 //save danh muc
 Route::post('/ad/updateDM/{category_product_id}',[CategoryProduct::class,'update_category_product']);


   //brand_product_them
   Route::get('/ad/add_brand_product',[BrandProduct::class,'add_brand_product']);
   Route::get('/ad/all_brand_product',[BrandProduct::class,'all_brand_product']);
   Route::post('/ad/saveTH',[BrandProduct::class,'save_brand_product']);
  //brand_all_tick_hien thi
   Route::get('/ad/unactive-brand-product/{brand_product_id}',[BrandProduct::class,'unactive_brand_product']);
   Route::get('/ad/active-brand-product/{brand_product_id}',[BrandProduct::class,'active_brand_product']); 
   //brand_update
   Route::get('/ad/edit_brand_product/{brand_product_id}',[BrandProduct::class,'edit_brand_product']);
   //xoa thuong hieu
   Route::get('/ad/delete_brand_product/{brand_product_id}',[BrandProduct::class,'delete_brand_product']);
   //save thuong hieu
   Route::post('/ad/updateTH/{brand_product_id}',[BrandProduct::class,'update_brand_product']);
   //Tim kiem thuong hieu
   Route::post('/ad/timkiemBR',[BrandProduct::class,'searchBrand']);


