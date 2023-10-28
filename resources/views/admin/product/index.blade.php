@extends('admin.master')

@section('body')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Product From</h4>

            <form class="form-horizontal p-t-20" action="{{ route('product.create') }}" method="POST" enctype="multipart/form-data">
                <h2 class="text-center text-success fw-bold">{{ session('message') }}</h2>
                @csrf
                <div class="form-group row">
                    <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="category_id" id="category_id">
                        <option value="" disabled selected> -- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" >{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputuname3" class="col-sm-3 control-label">Sub Category Name</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="sub_category_id" id="sub_category_id">
                        <option value="" disabled selected> -- Select Sub Category --</option>

                      </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputuname3" class="col-sm-3 control-label">Brand Name</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="brand_id">
                        <option value="" disabled selected> -- Select Brand --</option>
                        @foreach ($brands as $brand )
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputuname3" class="col-sm-3 control-label">Unit Name</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="unit_id">
                        <option value="" disabled selected> -- Select Unit --</option>
                        @foreach ($units as $unit )
                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                       @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputuname3" class="col-sm-3 control-label">Product Name*</label>
                    <div class="col-sm-9">
                        <div class="input-group">

                            <input type="text" class="form-control" name="product_name" id="exampleInputuname3" placeholder="Product Name">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputuname3" class="col-sm-3 control-label">Product Code*</label>
                    <div class="col-sm-9">
                        <div class="input-group">

                            <input type="text" class="form-control" name="product_code" id="exampleInputuname3" placeholder="Product Code">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputuname3" class="col-sm-3 control-label">Product Model*</label>
                    <div class="col-sm-9">
                        <div class="input-group">

                            <input type="text" class="form-control" name="product_model" id="exampleInputuname3" placeholder="Model">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputuname3" class="col-sm-3 control-label">Product Stock Amount*</label>
                    <div class="col-sm-9">
                        <div class="input-group">

                            <input type="number" class="form-control" name="stock_amount" id="exampleInputuname3" placeholder="Product Stock Amount">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputuname3" class="col-sm-3 control-label">Product Price*</label>
                    <div class="col-sm-9">
                        <div class="input-group">

                            <input type="number" class="form-control" name="regular_price" id="exampleInputuname3" placeholder="Regular Price">
                            <input type="number" class="form-control" name="selling_price" id="exampleInputuname3" placeholder="Selling Price">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputEmail3" class="col-sm-3 control-label">Short Description</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control" name="short_description" placeholder="Short description"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputEmail3" class="col-sm-3 control-label">Long Description</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control summernote" name="long_description" placeholder="Long description"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-sm-3 control-label" for="web">Featured Image</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="file" id="input-file-now" name="product_image" class="dropify"/>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="form-label col-sm-3 control-label" for="web">Other Images</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="file" id="input-file-now" name="other_image[]" accept="image/*" multiple name="Product_image" class="dropify"/>
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
                        <button type="submit" class="mt-4 text-white btn btn-success waves-effect waves-light">Create New Product</button>
                    </div>
                </div>
            </form>




        </div>
    </div>
</div>
@endsection
