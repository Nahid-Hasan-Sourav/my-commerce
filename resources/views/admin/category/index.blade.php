@extends('admin.master')

@section('body')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"></h4>

            <form class="form-horizontal p-t-20" action="{{ route('category.create') }}" method="POST" enctype="multipart/form-data">
                <h2 class="text-center text-success fw-bold">{{ session('message') }}</h2>
                @csrf
                <div class="form-group row">
                    <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name*</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                           
                            <input type="text" class="form-control" name="name" id="exampleInputuname3" placeholder="Category Name">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail3" class="col-sm-3 control-label">Category Description</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control" name="description" placeholder="category description"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="form-label col-sm-3 control-label" for="web">Category Image</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="file" id="input-file-now" name="category_image" class="dropify"/>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                    <div class="col-sm-9">
                        <label class="me-3">
                            <input type="radio" name="status" value="1" class="me-1">Published
                        </label>
                        <label class="">
                            <input type="radio" name="status" value="2" class="me-1">UnPublished
                        </label>
                    </div>
                </div>
                <div class="form-group row m-b-0">
                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="mt-4 text-white btn btn-success waves-effect waves-light">Create New Category</button>
                    </div>
                </div>
            </form>




        </div>
    </div>
</div>
@endsection
