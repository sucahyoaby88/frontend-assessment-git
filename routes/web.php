<?php

use App\Http\Controllers\OrderController;
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

Route::prefix('order')->group(function () {
    Route::get('/create', [OrderController::class, 'create']);
    // Route::get('/employees', [OrderController::class, 'get_employees']);
});
Route::prefix('request/ajax')->group(function () {
    Route::get('/products', [OrderController::class, 'get_products'])->name('get_products');
});