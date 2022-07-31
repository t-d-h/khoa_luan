<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\MomoController;

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

Route::get('view-table', function () {
    return view('app');
});
Route::get('table', [StoreController::class, 'table'])->name('table');

Route::prefix('store')->group(function () {
    Route::get('/', [StoreController::class, 'index']);

    //payment momo
    Route::prefix('momo')->group(function () {
        Route::get('atm', function () {
           return view('atm.atm_momo');
        });
        Route::post('atm', [MomoController::class, 'atm'])->name('momo.atm');
        Route::post('ipn_momo', [MomoController::class, 'ipn_momo']);
    });
});

