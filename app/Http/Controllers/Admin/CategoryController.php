<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $category=Category::all();
        $parentCategory=Category::where('parent_id','!=',0)->get();
        return view('admin.categories.create',compact('parentCategory','category'));
    }
}
