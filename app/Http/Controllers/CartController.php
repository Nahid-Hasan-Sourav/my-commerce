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
        if(empty($allCart)){
            foreach( $allCartArray as $data){
                if($data->id == $id){
                  $updateData = Cart::update($data->rowId,['qty' => $data->qty+1]);
                   return response()->json([
                  "status" => "success",
                  "message" => "The product is already exit in cart ",
              ],200);
                }
                else{
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
                  "status" => "success",
                  "message" => "The product added successfully ",
              ],200);
                }
               }
        }
        else{
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
                "status" => "success",
                "message" => "The product added successfully ",
            ],200);
        }
        
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

    public function deleteItemFromCart($rowId){
        $delete = Cart::remove($rowId);

        // if($delete){
            return response()->json([
                "status" => "success",
                "data"   =>  $delete,
                "message"=> "Item Delete From Cart"
            ]);
        // }
    }

}
