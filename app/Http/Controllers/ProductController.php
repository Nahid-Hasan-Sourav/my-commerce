<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\category\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::all();
        $brands     = Brand::all();
        $units      = Unit::all();

        return view('admin.product.index',compact('categories','brands','units'));
    }

    public function create(Request $request){
        dd($request->all());
        $product = new Product();


    }

    public function getSubCategoryByCategory($id){
        $data = SubCategory::where('category_id',$id)->get();
        return response()->json([
            "status"=>"success",
            "data"=>$data
        ],200);

    }
}
