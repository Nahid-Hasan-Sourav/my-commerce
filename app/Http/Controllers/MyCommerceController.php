<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MyCommerceController extends Controller
{
    public function index(){
        return view('website.home.index');
    }

    public function category($id){
        $products = Product::where('category_id',$id)->orderBy('id','desc')->get();
        return view('website.category.index',compact('products'));
    }
    public function detail(){
        return view('website.detail.index');
    }
}
