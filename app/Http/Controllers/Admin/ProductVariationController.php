<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    public function store($attributeId,$variation_values,$product)
    {
        // dd($attributeId);
        ProductVariation::create([
            'product_id'=>$product->id,
            'variation_id'=>$attributeId,
            'value'=>$variation_values[0],
            'quantity'=>$variation_values[1],
            'sku'=>$variation_values[2],
            'price'=>$variation_values[3],
            'sale_price'=>100,

        ]);
    }
}
