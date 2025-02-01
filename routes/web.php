<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\Api;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/get-products', [Api\ProductController::class, 'getList']);
    Route::get('/get-permission', [Api\UserPermissionController::class, 'checkPermission']);
    Route::post('/products',[ProductController::class, 'store']);
});
