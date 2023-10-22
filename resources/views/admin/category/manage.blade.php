@extends('admin.master')

@section('body')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category Table</h4>
                        <h6 class="card-subtitle">Showing All Category</h6>
                        <h2 class="text-center text-success fw-bold">{{ session('message') }}</h2>

                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table border table-striped">
                                <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th>Image</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($categories as $category )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            <img src="{{ asset($category->image) }}" alt="img" width="50px" height="50px">
                                        </td>
                                        <td>{{ $category->status ==1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('category.edit',['id'=>$category->id]) }}" class="btn btn-success btn-sm">
                                                <i class="ti-reddit"></i>
                                            </a>
                                            <a href="{{ route('category.delete',['id'=>$category->id]) }}" class="btn btn-danger btn-sm">
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
