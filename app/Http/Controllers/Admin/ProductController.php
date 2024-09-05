<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands=Brand::all();
        $categories=Category::all();
        $attributes=Attribute::all();
        return view('admin.products.create',compact('brands','categories','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required',

        ]);

        try {
            DB::beginTransaction();

            $ImageUpload=new ProductImageController();
            $imagesUpload=$ImageUpload->upload($request->primary_image, $request->images);

            $product=Product::create([
                'name'=>$request->name,
                'brand_id'=>$request->brand_id,
                'primary_image' => $imagesUpload['fileNamePrimaryImage'],
                'status'=> $request->status,
                'is_active'=>$request->is_active,
                'delivery_amount'=>$request->delivery_amount,
            ]);

            foreach($imagesUpload['fileNameImage'] as $fileNameImage){
                ProductImage::create([
                    'image'=> $fileNameImage,
                    'product_id'=>$product->id
                ]);
            }


            $productAttribute=new ProductAttributeController();
            $productAttribute->store($request->attributes_ids, $product);



            $productVaritaions=new ProductVariationController();
            $productVaritaions->store($request->variations_ids, $product);

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
