<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use App\Services\ProductSpecialService;
use App\Services\StoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\ProductService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class StoreController extends Controller
{
    public $productService;
    public $storeService;
    public $customerService;
    public $productSpecialService;

    public function __construct(
        ProductService $productService,
        StoreService $storeService,
        CustomerService $customerService,
        ProductSpecialService $productSpecialService
    )
    {
        $this->productService = $productService;
        $this->storeService = $storeService;
        $this->customerService = $customerService;
        $this->productSpecialService = $productSpecialService;
    }

    public function index()
    {
//        dd($this->productService->insert(1));
        $assign['specials'] = $this->productSpecialService->all()->load('product.component.color');

        return view('store.index', $assign);
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

    public function detail()
    {
        Breadcrumbs::register('continent', function ($breadcrumbs) {
            $breadcrumbs->push('Home', route(STORE));
            $breadcrumbs->push('ten san pham', route(STORE_PRODUCT_DETAIL));
        });

        return view('store.detail');
    }
}
