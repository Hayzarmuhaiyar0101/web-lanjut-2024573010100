<?php

namespace App\Service;
use App\DTO\ProductDTO;

class ProductService
{
    public function display(ProductDTO $product): array
{
    return [
        'name'=>$product->name,
        'price'=>$product->price,
        'description'=>$product->description,
    ];
}
}