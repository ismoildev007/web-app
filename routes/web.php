<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\MainController;
use config\auth\AdminController;
use config\auth\AuthController;
use config\auth\SuperAdminController;
use Illuminate\Support\Facades\Route;


//Admin panel login register start
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
//Admin panel login register end


Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/',[SuperAdminController::class, 'superAdmin'])->name('superAdmin.dashboard');
    Route::get('/admin',[AdminController::class, 'admin'])->name('admins.dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});

Route::get('/', [MainController::class, 'categories'])->name('categories');
Route::get('/product/{id}', [MainController::class, 'singleProduct'])->name('single.product');
Route::get('/category/{slug}', [MainController::class, 'show'])->name('category.show');
