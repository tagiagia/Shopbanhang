<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [CustomAuthController::class, 'index'])->name('login');

 // login user :
 Route::get('/login',[AuthManager::class,'login'])->name('login');
 Route::post('/login',[AuthManager::class,'loginPost'])->name('login.post');
 Route::get('/registration',[AuthManager::class,'registration'])->name('registration');
 Route::post('/registration',[AuthManager::class,'registrationPost'])->name('registration.post');
 Route::get('/logout',[AuthManager::class,'logout'])->name('logout');
 //san pham
 Route::get('/ad/delete_product/{product_id}',[ProductController::class,'delete_product']);
 //save san pham
 Route::post('/ad/updateSP/{product_id}',[ProductController::class,'update_product']);
 Route::post('/ad/timkiemSP',[ProductController::class,'search']);
