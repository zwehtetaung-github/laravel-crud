<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/product', [ProductController::class, 'index']);

Route::get('/product/add', [ProductController::class, 'add']);
Route::post('/product/add', [ProductController::class, 'create']);

Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
Route::post("/product/edit/{id}", [ProductController::class, 'update']);

Route::post("/product/delete/{id}", [ProductController::class, 'delete']);

Route::get('/', [ProductController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
