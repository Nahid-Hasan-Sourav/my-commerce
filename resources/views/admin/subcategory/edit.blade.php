@extends('admin.master')

@section('body')
<div class="col-lg-12"></div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Sub Category Form</h4>

            <form class="form-horizontal p-t-20" action="{{ route('subcategory.update',['id'=>$subCategory->id]) }}" method="POST" enctype="multipart/form-data">
                <h2 class="text-center text-success fw-bold">{{ session('message') }}</h2>
                @csrf
                <div class="form-group row">
                    <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="category_id">
                        <option value="" disabled selected> -- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $subCategory->category_id ? 'selected' : '' }}
                                >{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputuname3" class="col-sm-3 control-label">Sub category Name*</label>
                    <div class="col-sm-9">
                        <div class="input-group">

                            <input type="text" class="form-control" name="name" id="exampleInputuname3" placeholder="sub category Name"
                            value="{{ $subCategory->name }}"
                            >
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail3" class="col-sm-3 control-label">Sub category Description</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control" name="description"
                        {{$subCategory->name}}
                        ></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="form-label col-sm-3 control-label" for="web">Sub category Image</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="file" id="input-file-now" name="image" class="dropify"/>
                            <img src="{{ asset($subCategory->image) }}" alt="update-image" width="50px" height="50px">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                    <div class="col-sm-9">
                        <label class="me-3">
                            <input type="radio" name="status" value="1" class="me-1" {{$subCategory->status == 1 ? 'checked' : ''  }}>Published
                        </label>
                        <label class="">
                            <input type="radio" name="status" value="2" class="me-1"  {{$subCategory->status == 2 ? 'checked' : ''  }}>UnPublished
                        </label>
                    </div>
                </div>
                <div class="form-group row m-b-0">
                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="mt-4 text-white btn btn-success waves-effect waves-light">Update Sub Category</button>
                    </div>
                </div>
            </form>




        </div>
    </div>
</div>
@endsection




