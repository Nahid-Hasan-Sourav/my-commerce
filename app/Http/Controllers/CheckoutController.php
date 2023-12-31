<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class CheckoutController extends Controller
{
    public function index(){
        if(Session::get('customer_id')){
            $customerData = Customer::find(Session::get('customer_id'));
        }
        else{
            $customerData='';
        }
        return view('website.checkout.index',compact('customerData'));
    }

    public function newCashOrder(Request $request){
        
       DB::beginTransaction();
       try{
        if(Session::get('customer_id')){
            //customer is logged in
            $customerData = Customer::find(Session::get('customer_id'));
        }
        else{
           
            // $validatedData = $request->validate([
            //     'name'          => ['required'],
            //     'address'       => ['required'],
            //     'email'         => ['required|unique:customers','email'],
            //     'mobile'        => ['required|unique:customers','mobile'],
            //     // 'status'        => ['required'],
            // ], [
            //     'name.required'        => 'Name is required',
            //     'address.required'     => 'Address is required',
            //     'email.required'       => 'Email is required',
            //     'mobile.required'      => 'Mobile is required',
            // ]);

            // $validatedData = $request->validate([
            //     'name'    => ['required'],
            //     'address' => ['required'],
            //     'email'   => ['required', 'email', 'unique:customers'],
            //     'mobile'  => ['required', 'unique:customers'],
            // ], [
            //     'name.required'    => 'Name is required',
            //     'address.required' => 'Address is required',
            //     'email.required'   => 'Email is required',
            //     'mobile.required'  => 'Mobile is required',
            // ]);
            

             $data = [
            "name"              =>$request->name,
            "email"             =>$request->email,
            "mobile"            =>$request->mobile,
            "password"          =>bcrypt($request->mobile),
            "address"           =>$request->delivery_address,
            "nid"               =>$request->nid,
           ];
         
           $customerData = Customer::create($data);
           Session::put('customer_id',$customerData->id);
           Session::put('customer_name',$customerData->name);
        }
       
    
           $orderData = new Order();
           $orderData->customer_id         = $customerData->id;
           $orderData->order_date           = date('Y-m-d');
           $orderData->order_timestap       = strtotime(date('Y-m-d'));
           $orderData->order_timestap       = strtotime(date('Y-m-d'));
           //when i will show-cart route on that blade i save those data in session i get those data from session and those in data base
           $orderData->order_total          = Session::get('order_totall');
           $orderData->tax_total            = Session::get('totall_tax');
           $orderData->shipping_total       = Session::get('shipping_total');
        //    $orderData->order_status      = '';
           $orderData->delevery_address     = $request->delivery_address;
           $orderData->payment_type         = $request->payment_type;
        //    $orderData->payment_status       = '';
        //    $orderData->currency             = '';
        //    $orderData->transaction_id       = '';
    
           $orderData->save();
    
           foreach(Cart::content() as $item){
          
            $orderDetails = new OrderDetail();
            $orderDetails->order_id         = $orderData->id;
            $orderDetails->product_id       = $item->id;
            $orderDetails->product_name     = $item->name;
            $orderDetails->product_price    = $item->price;
            $orderDetails->product_qty      = $item->qty;
            $orderDetails->save();
            Cart::remove($item->rowId);
           }
           DB::commit();
           return redirect('/complete-order')->with('message','Your order info post successfully');
       }
       catch (\Exception $e) {
        // If an exception occurs, roll back the transaction
        DB::rollBack();

        // For now, let's redirect back with an error message
        return redirect()->back()->with('error', 'An error occurred while processing your order. Please try again.');
        // return redirect()->back();
    }
      

     


    }

    public function completeOrder(){
        return view('website.checkout.complete-order');
    }
}
