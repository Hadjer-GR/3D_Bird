<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
Route::get('/wp-admin/dashboard', [AdminController::class,'index'])->name('wp-admin.dashboard');

