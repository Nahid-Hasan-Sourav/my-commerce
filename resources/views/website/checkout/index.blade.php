@extends('website.master')

@section('title')
    Checkout Page
@endsection

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul class="nav nav-pills">
                            <li class="d-flex">
                                <a href="" class="nav-link active" data-bs-target="#cash" data-bs-toggle="pill">Cash On Delivery</a>
                                <a href="" class="nav-link" data-bs-target="#online" data-bs-toggle="pill">online</a>
                            </li>



                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="cash">
                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif
        
                             <form method="POST" action="{{ route('new.cash.order') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                     <div class="single-form form-default">
                                         <label>Full Name</label>
                                         <div class="col-md-12 form-input form">
                                            @if(isset($customerData->id))
                                             <input type="text"  name="name" value="{{$customerData->name}}" placeholder="Full Name">
                                             @else
                                             <input type="text"  name="name"  placeholder="Full Name">
                                             @error('name')
                                             <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                             @endif
                                         </div>
                                     </div>
                                    </div>
 
                                    <div class="col-md-6">
                                     <div class="single-form form-default">
                                         <label>Email Address</label>
                                         <div class="col-md-12 form-input form">
                                            @if(isset($customerData->email))
                                             <input type="email"  value="{{ $customerData->email }}" name="email" placeholder="Email">
                                             @else
                                             <input type="email"  name="email" placeholder="Email">

                                             @error('email')
                                             <span class="text-danger">{{ $message }}</span>
                                             @enderror

                                             @endif
                                         </div>
                                     </div>
                                    </div>
 
                                    <div class="col-md-6">
                                     <div class="single-form form-default">
                                         <label>Phone Number</label>
                                         <div class="col-md-12 form-input form">
                                            @if(isset($customerData->mobile))
                                             <input type="tel" name="mobile" value="{{$customerData->number}}" placeholder="Number">
                                             @else
                                             <input type="tel" name="mobile"  placeholder="Number">

                                             @error('mobile')
                                             <span class="text-danger">{{ $message }}</span>
                                             @enderror

                                             @endif
                                         </div>
                                     </div>
                                    </div>
 
                                    <div class="col-md-12">
                                     <div class="single-form form-default">
                                         <label>Delivery Address</label>
                                         <div class="col-md-12 form-input form">
                                            @if(isset($customerData->address))
                                            <textarea placeholder="Order Delivery Address" name="delivery_address">
                                                {{ 
                                                $customerData->address    
                                                }}
                                            </textarea>
                                            @else
                                             <textarea placeholder="Order Delivery Address" name="delivery_address">
 
                                             </textarea>
                                             @error('address')
                                             <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                             @endif
                                         </div>
                                     </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>NID</label>
                                            <div class="col-md-12 form-input form">
                                                @if(isset($customerData->nid))
                                                <input type="text" name="nid" value="{{ $customerData->nid }}"  placeholder="Nid">
                                                @else
                                                <input type="text" name="nid"  placeholder="Nid">
                                                
                                                @error('nid')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                
                                                @endif
                                            </div>
                                        </div>
                                       </div>

                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Payment Type</label>
                                            <div class="">
                                                <label>
                                                    <input type="radio" checked name="payment_type" value="1"> Cash On Delivery
                                                </label>
                                            </div>
                                        </div>
                                       </div>
 
 
                                     <div class="single-checkbox checkbox-style-3">
                                         <input type="checkbox" id="checkbox-3" checked>
                                         <label for="checkbox-3"><span></span></label>
                                         <p>
                                          I accept all terms & conditions
                                         </p>
                                     </div>
                                  <div class="col-md-12">
                                     <div class="single-form button">
                                         <button type="submit" class="btn">
                                             Confirm Order
                                         </button>
                                     </div>
                                  </div>
                                 </div>
                             </form>
                            </div>
                            <div class="tab-pane fade show" id="online">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        {{-- <div class="checkout-sidebar-coupon">
                            <p>Appy Coupon to get discount!</p>
                            <form action="#">
                                <div class="single-form form-default">
                                    <div class="form-input form">
                                        <input type="text" placeholder="Coupon Code">
                                    </div>
                                    <div class="button">
                                        <button class="btn">apply</button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">Shopping Cart Summery</h5>
                            <div class="sub-total-price">
                                @php($total=0)
                                @foreach(Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
                                <div class="total-price">
                                    <p class="value">
                                        {{ $item->name }}<br>
                                       ( {{ $item->price }} * {{ $item->qty }})
                                    </p>
                                    <p class="price">
                                        {{ $item->price * $item->qty }}
                                    </p>
                                </div>
                                @php($total=$total+($item->qty * $item->price))
                                @endforeach


                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">{{ $total }}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Tax Amount(15%)</p>
                                    <p class="price">{{ $tax=($total*15) / 100 }}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Shipping</p>
                                    <p class="price">100</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">{{$total+$tax+100}}</p>
                                </div>
                            </div>
                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{ asset('/') }}website/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
