<?php

namespace App\Http\Controllers;
use App\DTO\ProductDTO;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('product.create');
    }

    public function result(Request $request)
    {
        $dto = ProductDTO::fromRequest($request->all());
        $service = new ProductService();
        $product = $service->display($dto);
        return view('product.result', compact('product'));
    }
}
