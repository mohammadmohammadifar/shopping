<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function store($attributes, $product)
    {
        // dd($attributes);
        foreach($attributes as $key=>$attribute){
            ProductAttribute::create([
                'attribute_id'=>$key,
                'product_id'=>$product->id,
                'value'=>$attribute,
            ]);
        }
    }
}
