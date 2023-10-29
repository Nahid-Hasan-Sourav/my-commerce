@extends('admin.master')

@section('body')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Product</h4>
                        <h6 class="card-subtitle">Showing All Category</h6>
                        <h2 class="text-center text-success fw-bold">{{ session('message') }}</h2>

                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table border table-striped">
                                <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>Product Name</th>
                                        <th>Code</th>
                                        <th>Image</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($products as $product )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->short_description }}</td>
                                        <td>
                                            <img src="{{ asset($product->image) }}" alt="img" width="50px" height="50px">
                                        </td>
                                        <td>{{ $product->status ==1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('product.edit',['id'=>$product->id]) }}" class="btn btn-success btn-sm">
                                                <i class="ti-reddit"></i>
                                            </a>
                                            <a href="{{ route('product.delete',['id'=>$product->id]) }}" class="btn btn-danger btn-sm">
                                                <i class="ti-trash"></i>
                                            </a>
                                            <a href="{{ route('product.details',['id'=>$product->id]) }}" class="btn btn-primary btn-sm">
                                                <i class="fa-solid fa-circle-info"></i>                                               </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
