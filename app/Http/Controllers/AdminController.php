<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.product.create');
    }

    public function edit()
    {
        return view('admin.product.edit');
    }

    public function store(Request $request)
    {
        $file = $request->file('img');
        return $file->move('images', $file->getClientOriginalName());
    }
}
