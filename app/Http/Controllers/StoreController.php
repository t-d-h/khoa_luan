<?php

namespace App\Http\Controllers;

use App\Services\StoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use App\Services\ProductService;

class StoreController extends Controller
{
    public $productService;
    public $storeService;

    public function __construct(
        ProductService $productService,
        StoreService $storeService
    )
    {
        $this->productService = $productService;
        $this->storeService = $storeService;
    }

    public function index()
    {
//        dd($this->productService->insert(1));
        return view('store.index');
    }

    public function table()
    {
        return DataTables::of(DB::table('product')->get())->make(true);
    }

    public function addCart(Request $request)
    {
//        dd(Session::get('cart'));
        $dataRequest = $request->all();
        $dataRequest['time'] = strtotime(now());

        $this->storeService->addCart($dataRequest, $dataRequest['id']);

        return response()->json(Session::get('cart'));
    }

    public function getCartSession()
    {
//        return Session::flush();
        if (Session::has('cart')) {
            return response()->json(Session::get('cart'));
        }

        return response()->json();
    }

    public function removeCart()
    {
        $data = Session::get('cart');
        unset($data[6]);
    }
}
