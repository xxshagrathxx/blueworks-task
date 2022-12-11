<?php

use App\Http\Controllers\OrdersController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [OrdersController::class, 'index'])->name('orders.index');
Route::get('/create', [OrdersController::class, 'create'])->name('orders.create');
Route::post('/order/store', [OrdersController::class, 'store'])->name('orders.store');
