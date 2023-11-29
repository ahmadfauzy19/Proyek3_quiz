<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\barangController;
use App\Http\Controllers\pembelianController;

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
    return view('layout');
});

Route::get('/barang',[barangController::class, 'index']);
Route::post('/barang',[barangController::class, 'store']);
Route::get('/dataBarang', [barangController::class, 'list']);

Route::get('/pembelian',[pembelianController::class, 'index']);
Route::post('/pembelian',[pembelianController::class, 'store']);

