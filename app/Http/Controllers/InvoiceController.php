<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\ProductModel;
use App\Services\CustomerService;
use App\Services\PaymentService;
use App\Services\ProductColorService;
use App\Services\ProductComponentService;
use App\Services\ProductSpecialService;
use App\Services\ProductTypeService;
use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{

    protected $paymentService;

    public function __construct(
        PaymentService $paymentService
    )
    {
        $this->paymentService       = $paymentService;
    }

    public function index()
    {
        $assign['invoices'] = $this->paymentService->all();

        return view('admin.invoice.index', $assign);
    }

    public function update(Request $request)
    {
        $order_id = $request->input('order_id');
        dd(2);
        $payment = $this->paymentService->find('order_id', '=', $order_id);
        $payment->status = $request->input('status');
        $payment->save();

        return back();
    }
}
