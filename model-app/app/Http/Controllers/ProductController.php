<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\ViewModels\ProductViewModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('product.create');
    }
    
    public function result(Request $request)
    {
        $product = ProductViewModel::fromRequest($request->all());
        return view('product.result', compact('product'));
    }
}
