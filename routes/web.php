<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('productos/get', [productosController::class, 'getProductos'])->name('productos.get');
Route::get('productos/create', [productosController::class, 'createProductos'])->name('productos.create');
Route::get('productos/update', [productosController::class, 'updateProductos'])->name('productos.update');
Route::get('productos/delete', [productosController::class, 'deleteProductos'])->name('productos.delete');