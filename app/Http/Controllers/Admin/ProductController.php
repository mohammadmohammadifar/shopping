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
        $brands = Brand::all();
        $categories = Category::all();
        $attributes = Attribute::all();
        return view('admin.products.create', compact('brands', 'categories', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // return dd($request->primary_image);




        $request->validate([
            'name' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',

        ]);

        try {
            DB::beginTransaction();

            $ImageUpload = new ProductImageController();
            $imagesUpload = $ImageUpload->upload($request->primary_image, $request->images);

            // return dd($imagesUpload['imageUpload'] );


            $product = Product::create([
                'name' => $request->name,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'primary_image' => $imagesUpload['fileNamePrimaryImage'],
                'status' => 1,
                'is_active' => $request->is_active,
                'delivery_amount' =>100,
            ]);

            foreach ($imagesUpload['imageUpload'] as $fileNameImage) {
                ProductImage::create([
                    'image' => $fileNameImage,
                    'product_id' => $product->id
                ]);
            }


            $productAttribute = new ProductAttributeController();
            $productAttribute->store($request->attribute_ids, $product);


            $categoryId = Category::findOrFail($request->category_id);
            $attributeId = $categoryId->attributes()->wherePivot('is_variation', 1)->first()->id;
            $productVaritaions = new ProductVariationController();
            $productVaritaions->store($attributeId, $request->variation_values, $product);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('error', $ex->getMessage());
            return redirect()->back();
        }

        alert()->success('tnx', 'product is create');
        return redirect()->route('products.index');
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
