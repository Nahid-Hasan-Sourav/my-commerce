@extends('website.master')

@section('title')
Shoping Cart Page
@endsection

@section('body')

<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Cart</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="index.html">Shop</a></li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="shopping-cart section">
    <div class="container">
        <div class="cart-list-head">

            <div class="cart-list-title">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-12">
                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <p>Product Name</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Quantity</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Total</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Discount</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <p>Remove</p>
                    </div>
                </div>
            </div>
          
        
        

           
            @foreach ($datas as $data)
            {{-- {{ dd($data) }} --}}
        <div class="cart-single-list">
                <div class="row align-items-center">
                    <div class="col-lg-1 col-md-1 col-12">
                        <a href=""><img  src="{{ asset($data->options['image']) }}" alt=""></a>
                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
           
            <h5 class="product-name"><a href="{{ route('product.singleDetails',['id'=>$data->id]) }}">
                                {{ $data->name }}</a></h5>
                        <p class="product-des">
                            <span>
                                <em>Category: </em> {{ isset($data->options['category_name']) ? $data->options['category_name'] : 'N/A' }}
                            </span> 
                        <span>
                            <em>Sub-Cat : </em> 
                            {{ isset($data->options['sub_category_name']) ? $data->options['sub_category_name'] : 'N/A' }}
                            </span>
                        </p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <div class="count-input">
                            <p name="qty" id="qty_{{ $data->id }}" class="form-control qty" placeholder="" style="width:40px">
                               {{ $data->qty }}
                            </p>
                            <div class="flex-col mt-2 d-flex">
                                <button class="btn-sm me-2 quantity-increase" id="" value="{{ $data->id }}">
                                    +
                                </button>
                                <button class="btn-sm quantity-decrease" id="" value="{{ $data->id }}">
                                    -
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>${{$data->qty * $data->price}}</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>${{$data->options['regular_price'] - $data->price }}</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <a class="remove-item" href="javascript:void(0)"><i class="lni lni-close"></i></a>
                    </div>
                </div>
            </div> 
            @endforeach
            

        </div>
        <div class="row">
            <div class="col-12">

                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="#" target="_blank">
                                        <input name="Coupon" placeholder="Enter Your Coupon">
                                        <div class="button">
                                            <button class="btn">Apply Coupon</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="right">
                                <ul>
                                    <li>Cart Subtotal<span>$2560.00</span></li>
                                    <li>Shipping<span>Free</span></li>
                                    <li>You Save<span>$29.00</span></li>
                                    <li class="last">You Pay<span>$2531.00</span></li>
                                </ul>
                                <div class="button">
                                    <a href="{{route('checkout')}}" class="btn">Checkout</a>
                                    <a href="product-grids.html" class="btn btn-alt">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    $(".quantity-increase").click(function() {
        let btnId=$(this).val();
        let select_qty=$("#qty_"+btnId);
        let quantity = parseInt(select_qty.text());
        select_qty.text(quantity + 1);
    })
    $(".quantity-decrease").click(function() {
        let btnId=$(this).val();
        let select_qty=$("#qty_"+btnId);
        let quantity = parseInt(select_qty.text().trim());

        if (quantity > 1) {        
            // Decrease the quantity by 1
            select_qty.text(quantity - 1);
        } else {
            // If quantity is already 1 or less, set it to 1
            select_qty.text(1);
        }
    });
</script>

@endsection
