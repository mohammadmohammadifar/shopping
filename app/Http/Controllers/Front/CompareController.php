<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function add(Product $product)
    {
        if(session()->has('compareProduct')){
            if(in_array($product->id,session()->get('compareProduct'))){
                alert()->success('Tnx','before you added');
                return redirect()->back();
            }else{
                session()->push('compareProduct',[$product->id]);
            }

        }else{
            session()->put('compareProduct',[$product->id]);
        }
    }


    public function index()
    {
        if(session()->has('compareproduct')){
            $product=Product::findOrFail(session()->get('compareProduct'));
            return view('',compact('product'));
        }else{
            alert()->error('Tnx','please add product');
            return view('sadasd');
        }
    }
}


