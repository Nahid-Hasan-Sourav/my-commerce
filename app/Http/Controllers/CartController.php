<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // public function index(){
    //     return view('website.cart.index');
    // }
    public function addToCart(Request $request, $id)
    {

        $product = Product::find($id);

        // if(!$product){
        $itemData = [
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $product->selling_price,
            'options' => [
                'regular_price' => $product->regular_price,
                'sub_category_name' => $product->subCategory->sub_category_name,
                // Add more options as needed
            ],
        ];
        Cart::add($itemData);
        $data = Cart::get($id);
     
        return response()->json([
            "status" => "200",
            "message" => "The product added successfully ",
        ]);
      

    }

    public function showCart()
    {
        return view('website.cart.index');
    }

}
