<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\OrderExportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KassaController;
use App\Http\Controllers\KassaOrderController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('/kassa', [KassaController::class,'index'])->name('kassa.index');
Route::post('/kassa/pay', [KassaOrderController::class, 'pay'])->name('kassa.pay');
Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
Route::get('/restaurant',[RestaurantController::class,'index'])->name('restaurant.index');
Route::get('/table/{id}',[RestaurantController::class,'show'])->name('restaurant.show');
Route::resource('customers',CustomerController::class);
Route::view('/menukaart','menukaart.menu');
Route::view('/contact','contact.contact');
Route::view('/news', 'news.news');
Route::get('/getdishes', [DishController::class, 'getDishes']);
Route::resource('dishes', DishController::class);
Route::resource('categories', CategoryController::class);
Route::get('/menu/pdf', [MenuController::class, 'exportToPDF'])->name('menu.pdf');
Route::post('/order/add', [OrderController::class, 'addToOrder'])->name('order.add');
Route::get('/order', [OrderController::class, 'viewOrder'])->name('order.view');
Route::post('/order/update', [OrderController::class, 'updateOrder'])->name('order.update');
Route::post('/order/remove', [OrderController::class, 'removeFromOrder'])->name('order.remove');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::post('/login',[AuthController::class, 'authenticate']);
Route::get('/receipt/{table}/pdf',[ReceiptController::class, 'exportToPDF'])->name('receipt.pdf');
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/downloads', [OrderExportController::class, 'index'])->name('downloads.index');
Route::get('/downloads/{file}', [OrderExportController::class, 'download'])->name('downloads.download');
