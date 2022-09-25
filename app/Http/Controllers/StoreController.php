<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use App\Services\ProductColorService;
use App\Services\ProductComponentService;
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
    public $productComponentService;
    public $productColorService;

    public function __construct(
        ProductService          $productService,
        StoreService            $storeService,
        CustomerService         $customerService,
        ProductSpecialService   $productSpecialService,
        ProductComponentService $productComponentService,
        ProductColorService     $productColorService
    )
    {
        $this->productService = $productService;
        $this->storeService = $storeService;
        $this->customerService = $customerService;
        $this->productSpecialService = $productSpecialService;
        $this->productComponentService = $productComponentService;
        $this->productColorService = $productColorService;
    }

    public function index()
    {
//        dd($this->productService->insert(1));
        $assign['specials'] = $this->productSpecialService->all()->load('product.component.color');

        return view('store.index', $assign);
    }

    public function cart()
    {
        $assign['data'] = Session::has('cart') ? Session::get('cart') : '';
        dd($assign['data']);

        return view('store.cart');
    }

    public function addCart(Request $request)
    {
//        dd(Session::get('cart'));
        $dataRequest = $request->all();
        $product = $this->productService->findId($dataRequest['id']);
        $component = $this->productComponentService->findId($dataRequest['component']);

        $data = [
            'id' => $component->id,
            'name' => $product->name,
            'amount' => $dataRequest['amount'],
            'color' => $dataRequest['color'],
            'price' => $component->price,
            'img' => $component->image,
            'time' => strtotime(now())
        ];

        $this->storeService->addCart($data, $component->id);

        return response()->json(Session::get('cart'));
    }

    public function getCartSession()
    {
        if (Session::has('cart')) {
            return response()->json(Session::get('cart'));
        }

        return response()->json();
    }

    public function removeCart()
    {
        Session::flush();
        return Session::get('cart');
    }

    public function detail($id)
    {
        $assign['product'] = $this->productService->findId($id);
        $assign['component'] = $assign['product']->component->first();
        $name = $assign['product']->name;

        $data = $this->productComponentService->getColor($assign['product']->id);
        $colorIds = array_unique($data->pluck('color_id')->toArray());
        $assign['color'] = $this->productColorService->getColorByIds($colorIds);

        Breadcrumbs::register('continent', function ($breadcrumbs) use ($name){
            $breadcrumbs->push('Trang Chủ', route(STORE));
            $breadcrumbs->push($name, route(STORE_PRODUCT_DETAIL));
        });

        return view('store.detail', $assign);
    }
}
