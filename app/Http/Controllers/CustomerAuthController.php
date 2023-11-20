<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;
class CustomerAuthController extends Controller
{
    public function index(){
        return view('website.customer.index');
    }
    public function login(Request $request){
        // dd($request->all());
        $customerData = Customer::where('email',$request->email)->first();
       if($customerData){
        if(password_verify($request->password,$customerData->password)){
            Session::put('customer_id',$customerData->id);
            Session::put('customer_name',$customerData->name);
            return redirect('/customer-dashboard');
        }
        else{
            return back()->with('message','Invalid Password');
        }
       }
       else{
        return back()->with('message','invalid email');
       }
    }

    public function register(Request $request){
        dd($request->all());
    }
}
