<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\MomoController;
use App\Http\Controllers\VNPayController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductColorController;
use App\Http\Controllers\ProductSpecialController;
use App\Http\Controllers\ProductComponentController;

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

    Route::get('send', [StoreController::class, 'sendMail']);
});

//Admin Management
Route::prefix('admin')->group(function() {
    Route::prefix('product')->group(function () {
        Route::get('select-special', [AdminController::class, 'selectSpecial'])->name(GET_PRODUCT_SPECIAL);

        //CRUD product
        Route::get('index', [AdminController::class, 'index'])->name(ADMIN_PRODUCT_INDEX);
        Route::get('', [AdminController::class, 'create'])->name(ADMIN_PRODUCT_CREATE);
        Route::get('{id}', [AdminController::class, 'edit'])->name(ADMIN_PRODUCT_EDIT);
        Route::get('{id}/delete', [AdminController::class, 'delete'])->name(ADMIN_PRODUCT_DELETE);
        Route::post('', [AdminController::class, 'store'])->name(ADMIN_PRODUCT_STORE);

        //Product Component
        Route::get('/{id}/component', [ProductComponentController::class, 'create'])->name(ADMIN_PRODUCT_COMPONENT_CREATE);
        Route::post('/{id}/component', [ProductComponentController::class, 'store'])->name(ADMIN_PRODUCT_COMPONENT_STORE);

        //CRUD product type
        Route::prefix('type')->group(function () {
            Route::get('index', [ProductTypeController::class, 'index'])->name(ADMIN_PRODUCT_TYPE_INDEX);
            Route::get('', [ProductTypeController::class, 'create'])->name(ADMIN_PRODUCT_TYPE_CREATE);
            Route::get('{id}', [ProductTypeController::class, 'edit'])->name(ADMIN_PRODUCT_TYPE_EDIT);
            Route::get('{id}/delete', [ProductTypeController::class, 'delete'])->name(ADMIN_PRODUCT_TYPE_DELETE);
            Route::post('', [ProductTypeController::class, 'store'])->name(ADMIN_PRODUCT_TYPE_STORE);
        });

        //CRUD color
        Route::prefix('color')->group(function () {
            Route::get('index', [ProductColorController::class, 'index'])->name(ADMIN_PRODUCT_COLOR_INDEX);
            Route::get('', [ProductColorController::class, 'create'])->name(ADMIN_PRODUCT_COLOR_CREATE);
            Route::get('{id}', [ProductColorController::class, 'edit'])->name(ADMIN_PRODUCT_COLOR_EDIT);
            Route::get('{id}/delete', [ProductColorController::class, 'delete'])->name(ADMIN_PRODUCT_COLOR_DELETE);
            Route::post('', [ProductColorController::class, 'store'])->name(ADMIN_PRODUCT_COLOR_STORE);
        });

        //CRUD product special
        Route::prefix('special')->group(function () {
            Route::get('index', [ProductSpecialController::class, 'index'])->name(ADMIN_PRODUCT_SPECIAL_INDEX);
            Route::get('', [ProductSpecialController::class, 'create'])->name(ADMIN_PRODUCT_SPECIAL_CREATE);
            Route::get('{id}', [ProductSpecialController::class, 'edit'])->name(ADMIN_PRODUCT_SPECIAL_EDIT);
            Route::get('{id}/delete', [ProductSpecialController::class, 'delete'])->name(ADMIN_PRODUCT_SPECIAL_DELETE);
            Route::post('', [ProductSpecialController::class, 'store'])->name(ADMIN_PRODUCT_SPECIAL_STORE);
        });
    });

    //Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name(ADMIN_DASHBOARD);

    Route::get('summernote', function () {
       return view('store.index');
    });
});
