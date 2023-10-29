@extends('admin.master')

@section('body')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product Information</h4>
                        <h6 class="card-subtitle">Showing All Category</h6>
                        <h2 class="text-center text-success fw-bold">{{ session('message') }}</h2>

                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table border table-striped">
{{-- {{ dd($product->otherImage)}} --}}
                                    <tr>
                                       <th>Product Id</th>
                                       <td>{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Name</th>
                                        <td>{{ $product->name }}</td>
                                     </tr>
                                     <tr>
                                        <th>Category Name</th>
                                        <td>{{ $product->category->name }}</td>
                                     </tr>
                                     <tr>
                                        <th>Sub Category Name</th>
                                        <td>{{ $product->subCategory->name }}</td>
                                     </tr>
                                     <tr>
                                        <th>Brand Name</th>
                                        <td>{{ $product->brand->name }}</td>
                                     </tr>
                                     <tr>
                                        <th>Unit Name</th>
                                        <td>{{ $product->unit->name }}</td>
                                     </tr>
                                     <tr>
                                        <th>Product Code</th>
                                        <td>{{ $product->code }}</td>
                                     </tr>
                                     <tr>
                                        <th>Product Model</th>
                                        <td>{{ $product->model }}</td>
                                     </tr>
                                     <tr>
                                        <th>Stock Amount</th>
                                        <td>{{ $product->stock_amount }}</td>
                                     </tr>
                                     <tr>
                                        <th>Regular Price</th>
                                        <td>{{ $product->regular_price }}</td>
                                     </tr>
                                     <tr>
                                        <th>Selling Price</th>
                                        <td>{{ $product->selling_price }}</td>
                                     </tr>
                                     <tr>
                                        <th>Short Description</th>
                                        <td>{{ $product->short_description }}</td>
                                     </tr>
                                     <tr>
                                        <th>Long Description</th>
                                        <td>{!! $product->long_description !!}</td>

                                     </tr>
                                     <tr>
                                        <th>Featured Image</th>
                                        <td>
                                            <img src="{{asset($product->image) }}"/>
                                        </td>
                                     </tr>
                                     <tr>
                                        <th>Other Image</th>
                                        <td>
                                        @isset($product->otherImage)

                                        @foreach($product->otherImage as $image)

                                            <img src="{{ asset($image->image) }}" width="80" height="80"/>
                                        @endforeach
                                       @endisset
                                    </td>
                                     </tr>
                                     <tr>
                                        <th>Hit Count</th>
                                        <td>{{ $product->hit_count ?? '0' }}</td>

                                     </tr>
                                     <tr>
                                        <th>Sales Count</th>
                                        <td>{{ $product->sales_count ?? '0' }}</td>

                                     </tr>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
