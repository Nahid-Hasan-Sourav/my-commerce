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
         $allCart = Cart::content();
         $allCartArray = $allCart->values()->all();

        //  for($i=0;$i<count($allCart);$i++){
        //     $data=$allCart[$i];
            return response()->json([
                "data"=>   $allCartArray,
                "status" => "200",
                "message" => "The product added successfully ",
            ]);
        //  }
         
         
        $itemData = [
            'id'                => $product->id,
            'name'              => $product->name,
            'qty'               => $request->qty,
            'price'             => $product->selling_price,
            'options' => [
                'image'             => $product->image,
                'regular_price'     => $product->regular_price,
                'sub_category_name' => $product->subCategory->name,
                'category_name'     => $product->category->name
            ],
        ];
        Cart::add($itemData);
     
        return response()->json([
            "status" => "200",
            "message" => "The product added successfully ",
        ]);
      

    }

    public function showCart()
    {
        $datas = Cart::content();
        // dd($datas);
        return view('website.cart.index',compact('datas'));
    }

    public function increaseUpdateQuantity(Request $request,$rowId){
        $updateData = Cart::update($rowId,['qty' => $request->updateQuantityValue]);
        
        return response()->json([
            "status"=>"success",
            "data"=> $updateData
        ]);
    }

    public function decreaseUpdateQuantity(Request $request,$rowId){
        $updateData = Cart::update($request->rowId,['qty' => $request->updateDecreaseQuantityValue]);
     
        return response()->json([
            "status"=>"success",
            "data"=> $updateData
        ]);
    }

}
