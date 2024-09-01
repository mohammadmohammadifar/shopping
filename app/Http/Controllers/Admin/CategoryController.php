<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::orderByDesc('created_at')->paginate(10);
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        // $category = Category::all();
        $attributes = Attribute::all();
        $parentCategory = Category::where('parent_id', 0)->get();
        return view('admin.categories.create', compact('parentCategory', 'attributes'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required'
        ]);

        try {
            DB::beginTransaction();

            $category=Category::create([
                'name'=>$request->name,
                'parent_id'=>$request->parent_id,
                'is_active'=>$request->is_active,
                'description'=>$request->description
            ]);

            foreach($request->attribute_ids as $attributeId){
                $attribute=Attribute::findOrFail($attributeId);
                $attribute->categories()->attach($category->id,[
                    'is_filter'=>$attributeId==$request->is_filter ? 1 : 0,
                    'is_variation'=> in_array($attributeId,$request->variation_ids) ? 1 : 0
                ]);
            }


            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();

            alert()->error('Tnx', $ex->getMessage());
            return redirect()->back();
        }

        alert()->success('tnx','category is created');
        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        $parentCategories=Category::where('parent_id',0)->get();
        $brands=Brand::all();
        $attributes=Attribute::all();

        return view('admin.categories.edit',compact('category','parentCategories','attributes'));
    }
}
