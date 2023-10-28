<?php


use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;

Route::resource("/wp-admin/blogs",BlogController::class);
