<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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



Route::get('/', [HomeController::class,'index']);





Route::middleware('auth')->group(function () {
    Route::get("/wp-admin/logout",[AuthController::class,'logout'])->name("wp-admin.logout");
    require __DIR__.'/Admin/Home.php';
    require __DIR__.'/Admin/Product.php';
    require __DIR__.'/Admin/Blog.php';



});







Route::get("/wp-admin/login",[AuthController::class,'index'])->name('admin.login');
//login
Route::post("/wp-admin/login",[AuthController::class,'login'])->name("wp-admin.authentication");
Route::resource("/Categorie",CategorieController::class);


require __DIR__.'/auth.php';


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
