<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class StoreController extends Controller
{
    public function index()
    {
        return view('store.index');
    }

    public function table()
    {
        return DataTables::of(DB::table('product')->get())->make(true);
    }
}
