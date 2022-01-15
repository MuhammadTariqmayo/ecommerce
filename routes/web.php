<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/',[HomeController::class,'index']);
Route::get('/product',[AdminController::class,'product'])->name('products');
Route::post('/create',[AdminController::class,'create'])->name('products.create');
Route::get('/showproduct',[AdminController::class,'show'])->name('show.products');
Route::get('/delete/{id}',[AdminController::class,'destroy'])->name('delete.product');
Route::get('/update/{id}',[AdminController::class,'update'])->name('update.product');
Route::post('/edit/{id}',[AdminController::class,'edit'])->name('edit.product');
Route::get('/search',[HomeController::class,'search'])->name('search.product');
Route::post('/addcart/{id}',[HomeController::class,'addcart'])->name('addcart.product');
Route::any('/show-product',[HomeController::class,'showcart'])->name('show.cart');
Route::any('/deletecart/{id}',[HomeController::class,'delete'])->name('delete.product');
Route::any('/order',[HomeController::class,'confirmorder'])->name('confirm.order');

Route::get('/showorder',[AdminController::class,'showorder'])->name('show.order');
Route::any('/statusupdate/{id}',[AdminController::class,'updatestatus'])->name('update.status');




