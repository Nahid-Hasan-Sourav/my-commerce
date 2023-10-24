@extends('admin.master')

@section('body')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sub-Category Table</h4>
                        <h6 class="card-subtitle">Showing All Category</h6>
                        <script>
                            // success message popup notification
                            @if(Session::has('message'))
                            toastr.success("{{ Session::get('message') }}", "Success", {
                            "toastClass": "toast bg-success text-white",
                            "progressBarClass": "bg-success"
                            });

                            @endif

                            // error message popup notification
                            @if(Session::has('error'))
                            toastr.error("{{ Session::get('error') }}", "Error", {
                             "toastClass": "toast bg-danger text-white",
                             "progressBarClass": "bg-danger"
                             });
                            @endif
                        </script>
                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table border table-striped">
                                <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>Category Name</th>
                                        <th>Sub-category name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($subcategories as $subcategory )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>{{ $subcategory->category->name }}</td>
                                        <td>{{ $subcategory->description }}</td>
                                        <td>
                                            <img src="{{ asset($subcategory->image) }}" alt="img" width="50px" height="50px">
                                        </td>
                                        <td>{{ $subcategory->status ==1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('subcategory.edit',['id'=>$subcategory->id]) }}" class="btn btn-success btn-sm">
                                                <i class="ti-reddit"></i>
                                            </a>
                                            <a href="{{ route('subcategory.delete',['id'=>$subcategory->id]) }}" class="btn btn-danger btn-sm">
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
