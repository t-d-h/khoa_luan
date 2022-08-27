<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\MomoController;
use App\Http\Controllers\VNPayController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('view-table', function () {
    return view('app');
});
Route::get('table', [StoreController::class, 'table'])->name('table');

//Store
Route::prefix('store')->group(function () {
    Route::get('/', [StoreController::class, 'index'])->name(STORE);

    //cart shop
    Route::get('cart', function () {
       return view('store.cart');
    });
    Route::get('payment', function () {
       return view('store.payment');
    });
    Route::get('detail', [StoreController::class, 'detail'])->name(STORE_PRODUCT_DETAIL);
    Route::get('cart-session', [StoreController::class, 'getCartSession']);
    Route::get('add-cart', [StoreController::class, 'addCart'])->name('add.cart');

    //Payment momo
    Route::prefix('momo')->group(function () {
        Route::get('atm', function () {
           return view('atm.atm_momo');
        });
        Route::post('atm', [MomoController::class, 'atm'])->name('momo.atm');

        //Webhook momo
        Route::get('result', function (\Illuminate\Http\Request $request) {
            return $request->all();
        });
    });

    //Payment vnpay
    Route::prefix('vnpay')->group(function () {
        Route::get('atm', [VNPayController::class, 'atm']);
        Route::post('atm', [VNPAYController::class, 'createPayment'])->name(CREATE_PAYMENT_VNPAY);
        Route::get('result', [VNPayController::class, 'result']);
    });
});

//Admin Management
Route::prefix('admin')->group(function() {
    Route::prefix('product')->group(function () {
        Route::get('', [AdminController::class, 'create']);
        Route::get('{id}', [AdminController::class, 'edit']);
        Route::post('', [AdminController::class, 'store'])->name(ADMIN_PRODUCT);
    });
    Route::get('/', function () {
       return view('admin.product.index');
    });

    Route::post('/', [AdminController::class, 'store'])->name(ADMIN_PRODUCT);

    Route::get('summernote', function () {
       return view('store.index');
    });
});
