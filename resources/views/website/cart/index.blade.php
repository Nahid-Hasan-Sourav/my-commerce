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




            @php($sum=0)
            @foreach ($datas as $data)
            {{-- {{ dd($data->rowId) }} --}}
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
                                <button class="btn-sm me-2 quantity-increase" id=""  value="{{ json_encode(['rowId' => $data->rowId, 'id' => $data->id]) }}">
                                    +
                                </button>
                                <button class="btn-sm quantity-decrease" id=""  value="{{ json_encode(['rowId' => $data->rowId, 'id' => $data->id]) }}">
                                    -
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12" >
                        <p>$<span id="total_price_{{ $data->id }}">{{$data->qty * $data->price}}</span></p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p >$<span id="discount_price_{{$data->id}}">{{($data->qty * $data->options['regular_price']) - ($data->qty * $data->price) }}</span></p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <button class="remove-item" id="remove-item"  value="{{$data->rowId}}" onclick="deleteItem('{{$data->rowId}}')"><i class="lni lni-close"></i></button>
                    </div>
                </div>
            </div>
            @php($sum=$sum+($data->qty * $data->price))
            @endforeach


        </div>
        <div class="row">
            <div class="col-12">

                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            {{-- <div class="left">
                                <div class="coupon">
                                    <form action="#" target="_blank">
                                        <input name="Coupon" placeholder="Enter Your Coupon">
                                        <div class="button">
                                            <button class="btn">Apply Coupon</button>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="right">
                                <ul>
                                    <li>Totall Price<span>$<span id="total-price">{{ $orderTotal=$sum }}</span></span></li>
                                    <li>
                                        Tax(15%)

                                        <span id="tax" name="tax">

                                            {{ $tax=($sum*15)/100 }}
                                        </span>
                                    </li>
                                    <li>Shipping<span id="shipping">{{ $shipping=100 }}</span></li>
                                    {{-- <li>You Save<span>$29.00</span></li> --}}
                                    <li class="last">Totall Payable<span id="totall-payable">{{$sum+$tax+100}}</span></li>
                                </ul>
                                <?php 
                                
                                Session::put('order_totall',$orderTotal);
                                Session::put('totall_tax',$tax);
                                Session::put('shipping_total',$shipping);
                                ?>
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

        let btnId= JSON.parse($(this).val());
        let rowId= btnId.rowId;

        let select_qty=$("#qty_"+btnId.id);
        let quantity = parseInt(select_qty.text());

        //get the current quantity value start here
        let updateQuantity=select_qty.text(quantity + 1);
        let updateQuantityValue=updateQuantity.text();
        //get the current quantity value end here

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            , }
        , });

        $.ajax({
            url:"/increase-update-quantity/" + rowId,
            type:"POST",
            data:{
                updateQuantityValue
            },
            success:function(res){
                console.log(res);
                if(res.status=="success"){
                    console.log("single data",res.data);
                    // click increase button and update total price start here
                    let selectTotalTag = $("#total_price_"+btnId.id);
                    let price = Number(res.data.qty * res.data.price)
                    // console.log("total price",price)
                    selectTotalTag.text(price)
                    //click increase button and update total price end here

                    //click increase button and update discount price start here
                    let selectDiscountTag = $("#discount_price_"+btnId.id);
                    let discountPrice = Number((res.data.qty*res.data.options.regular_price) - (res.data.qty * res.data.price))
                    selectDiscountTag.text(discountPrice);
                    // click increase button and update discount price end here

                    //update the total price in order card start here
                    let totalPrice = $("#total-price").text();
                    $("#total-price").text(Number(totalPrice)+res.data.price)
                     //update the total price in order card end here

                    //click the increase button and update the tax start here
                    let totalPrices = Number($("#total-price").text());
                    totalPrices=(totalPrices*15)/100
                    $("#tax").text(totalPrices)
                    // console.log("Total price click on + button",typeof(totalPrices));
                    //click the decrease button and update the tax end here

                    //update the totall payable price start here
                    let total_prices = Number($("#total-price").text());
                    let tax=Number($("#tax").text());

                    $("#totall-payable").text(total_prices+tax+100)
                    //update the totall payable price end here


                }
            },
            error: function(xhr, status, error) {
                console.log("Error: ", error);
                var response = JSON.parse(xhr.responseText);
                console.log("Error Message: ", response.message);
            }
        })
    })
    $(".quantity-decrease").click(function() {
        let btnId= JSON.parse($(this).val());
        let rowId = btnId.rowId;

        let select_qty=$("#qty_"+btnId.id);
        let quantity = parseInt(select_qty.text());
        let updateDecreaseQuantityValue;
        if (quantity > 1) {
            // Decrease the quantity by 1
            select_qty.text(quantity - 1);
            updateDecreaseQuantityValue =select_qty.text();

            //ajax call here for update the total price.
            //jodi quantity 1 hoy tahohole value decrease hobe na so total price minus hobe na (+/-) button a click korleo
        $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            , }
        , });

        $.ajax({
            url:"/decrease-update-quantity/" + rowId,
            type:"POST",
            data:{
                updateDecreaseQuantityValue,
                rowId
            },
            success:function(res){
                if(res.status=="success"){
                    console.log("Decrease",res.data);
                    //click increase button and update total price start here
                    let selectTotalTag = $("#total_price_"+btnId.id);
                    let price = Number(res.data.qty * res.data.price)
                    console.log("total price",price)
                    selectTotalTag.text(price)
                    //click increase button and update total price end here

                    //click increase button and update discount price start here
                    let selectDiscountTag = $("#discount_price_"+btnId.id);
                    let discountPrice = Number((res.data.qty*res.data.options.regular_price) - (res.data.qty * res.data.price))
                    selectDiscountTag.text(discountPrice);
                    //click increase button and update discount price end here

                     //update the total price in order card start here
                     let totalPrice = $("#total-price").text();
                     $("#total-price").text(Number(totalPrice)-res.data.price)
                     //update the total price in order card end here

                      //click the decrease button and update the tax start here
                    let totalPrices = Number($("#total-price").text());
                    totalPrices=(totalPrices*15)/100
                    $("#tax").text(totalPrices)
                    // console.log("Total price click on + button",typeof(totalPrices));
                    //click the decrease button and update the tax end here

                    //update the totall payable price start here
                    let total_prices = Number($("#total-price").text());
                    let tax=Number($("#tax").text());

                    $("#totall-payable").text(total_prices+tax+100)
                    //update the totall payable price end here

                }
            },
            error: function(xhr, status, error) {
                console.log("Error: ", error);
                var response = JSON.parse(xhr.responseText);
                console.log("Error Message: ", response.message);
            }
        })
        } else {
            // If quantity is already 1 or less, set it to 1
            select_qty.text(1);
            updateDecreaseQuantityValue =select_qty.text();
            console.log("Decrease",updateDecreaseQuantityValue);



        }
        // $.ajaxSetup({
        //     headers: {
        //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        //     , }
        // , });
        // $.ajax({
        //     url:"/decrease-update-quantity/" + rowId,
        //     type:"POST",
        //     data:{
        //         updateDecreaseQuantityValue,
        //         rowId
        //     },
        //     success:function(res){
        //         if(res.status=="success"){
        //             console.log("Decrease",res.data);
        //             //click increase button and update total price start here
        //             let selectTotalTag = $("#total_price_"+btnId.id);
        //             let price = Number(res.data.qty * res.data.price)
        //             console.log("total price",price)
        //             selectTotalTag.text(price)
        //             //click increase button and update total price end here

        //             //click increase button and update discount price start here
        //             let selectDiscountTag = $("#discount_price_"+btnId.id);
        //             let discountPrice = Number((res.data.qty*res.data.options.regular_price) - (res.data.qty * res.data.price))
        //             selectDiscountTag.text(discountPrice);
        //             //click increase button and update discount price end here

        //              //update the total price in order card start here
        //              let totalPrice = $("#total-price").text();
        //              $("#total-price").text(Number(totalPrice)-res.data.price)
        //              //update the total price in order card end here

        //         }
        //     },
        //     error: function(xhr, status, error) {
        //         console.log("Error: ", error);
        //         var response = JSON.parse(xhr.responseText);
        //         console.log("Error Message: ", response.message);
        //     }
        // })
    });

    //delete item from cart
    // $(".remove-item").click(function(){
    //     let rowId = $(".remove-item").val();

    //     // alert(rowId)
    // })

    function deleteItem(rowId){
    //  console.log("row id",rowId);
     Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'

     }).then((res) => {
        console.log("Response alert",res)
        if(res.isConfirmed){
            $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            , }
        , });

        $.ajax({
            url: "/delete-cart-item/" + rowId,
            type: "DELETE",

            success: function(response) {
            console.log("After Delete ",response)
                if (response.status == "success") {
                    Swal.fire({
                    title: 'Deleted!',
                    text: response.message,
                    icon: 'success',
                    timer: 5000
                    });
                    window.location.href = "{{ route('show-cart') }}";

                }

                // console.log("Id", response);


            }
            , error: function(xhr, status, error) {
                console.log("Error: ", error);
                var response = JSON.parse(xhr.responseText);
                console.log("Error Message: ", response.message);
            }
        , });


        }
     });

    }
</script>

@endsection
