<?php

namespace App\Http\Controllers;

use App\Events\RegisterEvent;
use App\Mail\VerifyEmail;
use App\Models\AdminModel;
use App\Models\User;
use App\Services\StoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Services\ProductService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

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

    public function login(Request $request)
    {
        $data = $request->only(['email', 'password']);

        //Check active account
        $customer = User::where('email', $data['email'])->first();
        if ($customer->status == 0) {
            return redirect()->back()->with(['status' => 'fail', 'message' => 'Hãy kích hoạt tài khoản']);
        }

        if (Auth::guard('web')->attempt($data)) {
            return redirect()->to(route(STORE));
        }

        return redirect()->back()->with(['status' => 'fail', 'message' => 'Đăng nhập thất bại']);
    }

    public function register(Request $request)
    {
        $dataRequest = $request->all();
        $validator = Validator::make($request->all(), [
            'email' => 'unique:users,email,' . $request->input('id') ?? null,
        ]);

        if (!$validator->passes() || $dataRequest['password'] != $dataRequest['repassword']) {
            return redirect()->back()->with(['status' => 'fail', 'message' => 'Đăng kí thất bại']);
        }

        $data = [
            'name'              => $request->input('name'),
            'email'             => $request->input('email'),
            'password'          => Hash::make($request->input('password')),
            'remember_token'    => time()
        ];

        if (User::create($data)) {
            RegisterEvent::dispatch($data['email'], $data['remember_token']);
            return redirect()->back()->with(['status' => 'success', 'message' => 'Đăng kí thành công']);
        }

        return redirect()->back()->with(['status' => 'fail', 'message' => 'Đăng kí thất bại']);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->to(route(STORE));
    }

    public function active($email, $token)
    {
        $customer = User::where('email', $email)->first();
        if ($customer->remember_token == $token) {
            $customer->status = 1;
            $customer->save();
            return redirect()->to(route(STORE_LOGIN));
        }

        abort(404);
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
