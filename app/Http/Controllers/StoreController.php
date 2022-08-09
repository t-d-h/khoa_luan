<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Services\ProductService;

class StoreController extends Controller
{
    public $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        dd($this->productService->insert(1));
        return view('store.index');
    }

    public function table()
    {
        return DataTables::of(DB::table('product')->get())->make(true);
    }
}
