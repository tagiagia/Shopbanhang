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
Route::get('/ad/login_admin',[AdminController::class,'index']);
