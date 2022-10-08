<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use App\Services\MomoService;
use App\Services\PaymentService;
use App\Services\ProductColorService;
use App\Services\ProductComponentService;
use App\Services\ProductSpecialService;
use App\Services\StoreService;
use App\Services\VnpayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Services\ProductService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class StoreController extends Controller
{
    protected $productService;
    protected $storeService;
    protected $customerService;
    protected $productSpecialService;
    protected $productComponentService;
    protected $productColorService;
    protected $momoService;
    protected $vnpayService;
    protected $paymentService;

    public function __construct(
        ProductService          $productService,
        StoreService            $storeService,
        CustomerService         $customerService,
        ProductSpecialService   $productSpecialService,
        ProductComponentService $productComponentService,
        ProductColorService     $productColorService,
        MomoService             $momoService,
        VnpayService            $vnpayService,
        PaymentService          $paymentService
    )
    {
        $this->productService           = $productService;
        $this->storeService             = $storeService;
        $this->customerService          = $customerService;
        $this->productSpecialService    = $productSpecialService;
        $this->productComponentService  = $productComponentService;
        $this->productColorService      = $productColorService;
        $this->momoService              = $momoService;
        $this->vnpayService             = $vnpayService;
        $this->paymentService           = $paymentService;
    }

    public function index()
    {
//        dd($this->productService->insert(1));
        $assign['specials'] = $this->productSpecialService->allAvailable()->load('product.component.color');

        return view('store.index', $assign);
    }

    public function cart()
    {
        $session = Session::has('cart') ? Session::get('cart') : null;

        return view('store.cart', ['data' => $session]);
    }

    public function addCart(Request $request)
    {
//        dd(Session::get('cart'));
        $dataRequest = $request->all();
        $product = $this->productService->findId($dataRequest['id']);
        $component = $this->productComponentService->findId($dataRequest['component']);

        $data = [
            'id'        => $component->id,
            'name'      => $product->name,
            'amount'    => $dataRequest['amount'],
            'color'     => $component->color->name,
            'price'     => $component->price,
            'memory'    => $component->memory,
            'img'       => $component->image,
            'time'      => strtotime(now())
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

        return redirect()->to(route(STORE_CART));
    }

    public function deleteCart($id)
    {
        $session = Session::get('cart');
        unset($session[$id]);
        Session::put('cart', $session);

        return redirect()->to(route(STORE_CART));
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

    public function getMemory(Request $request)
    {
        $dataRequest = $request->all();
        $memory = $this->productComponentService->getMemory($dataRequest['id'], $dataRequest['color']);

        return response()->json(['data' => $memory]);
    }

    public function createPayment(Request $request)
    {
        //Check login
        if (!Auth::guard('web')->check()) {
            return redirect()->to(route(STORE_LOGIN));
        }

        //Check item
        if (empty($dataRequest['component'])) {
            return redirect()->to(route(STORE));
        }

        $dataRequest = $request->all();

        //Save payment to db
        $paymentInfo = [];
        foreach ($dataRequest['component'] as $key => $value) {
            $paymentInfo[] = [
                'component' => $value,
                'amount'    => $dataRequest['amount'][$key]
            ];
        }

        $data = [
            'order_id'      => time(),
            'customer_id'   => Auth::guard('web')->user()->id,
            'payment_type'  => $dataRequest['payment_type'],
            'total'         => $dataRequest['total'],
            'payment_info'  => json_encode($paymentInfo)
        ];
        $this->paymentService->insert($data);

        if ($dataRequest['payment_type'] == 'momo') {
            $payUrl = $this->momoService->createPayment($data['order_id'], $dataRequest['total']);
        } else {
            $payUrl = $this->vnpayService->createPayment($data['order_id'], $dataRequest['total']);
        }

        return redirect()->to($payUrl);
    }

    public function listCategory()
    {
        return view('store.list_category');
    }
}
