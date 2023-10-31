<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MyCommerceController extends Controller
{
    public function index(){
        $trendingProducts = Product::orderBy('id','desc')->take(8)->get();
        return view('website.home.index',compact('trendingProducts'));
    }

    public function category($id){
        $products = Product::where('category_id',$id)->orderBy('id','desc')->get();
        return view('website.category.index',compact('products'));
    }
    // public function detail(){
      
    //     return view('website.detail.index');
    // }
    public function singleProductDetails($id){
        $productDetails = Product::find($id);
        return view('website.detail.index',compact('productDetails'));
    }
}
