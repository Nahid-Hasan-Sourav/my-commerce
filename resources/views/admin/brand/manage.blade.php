@extends('admin.master')

@section('body')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Brand Table</h4>
                        <h6 class="card-subtitle">Showing All Brand</h6>
                        <h2 class="text-center text-success fw-bold">{{ session('message') }}</h2>

                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table border table-striped">
                                <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>Brand Name</th>
                                        <th>Brand Description</th>
                                        <th>Image</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($brands as $brand )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->description }}</td>
                                        <td>
                                            <img src="{{ asset($brand->image) }}" alt="img" width="50px" height="50px">
                                        </td>
                                        <td>{{ $brand->status ==1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('brand.edit',['id'=>$brand->id]) }}" class="btn btn-success btn-sm">
                                                <i class="ti-reddit"></i>
                                            </a>
                                            <a href="{{ route('brand.delete',['id'=>$brand->id]) }}" class="btn btn-danger btn-sm">
                                                <i class="ti-trash"></i>
                                            </a>
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
