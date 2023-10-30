<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\category\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function getImageUrl($file, $path){
        $file_path = null;

        if ($file && $file !== 'null') {
            $file_name = date('Ymd-his') . '.' . $file->getClientOriginalName();
            $destinationPath = public_path($path);
            $file->move($destinationPath, $file_name);
            $file_path = $path . $file_name;
        }

        return $file_path ?? null;
    }

    public function index(){
        $categories = Category::all();
        $brands     = Brand::all();
        $units      = Unit::all();

        return view('admin.product.index',compact('categories','brands','units'));
    }

    public function create(Request $request){
        // dd($request->files);
       // dd( $otherImageFiles = $request->file('other_image'));
        $product = new Product();
        $product->category_id           = $request->category_id;
        $product->sub_category_id       = $request->sub_category_id;
        $product->brand_id              = $request->brand_id;
        $product->unit_id               = $request->unit_id;
        $product->name                  = $request->product_name;
        $product->code                  = $request->product_code;
        $product->model                 = $request->product_model;
        $product->stock_amount           = $request->stock_amount;
        $product->regular_price         = $request->regular_price;
        $product->selling_price         = $request->selling_price;
        $product->short_description     = $request->short_description;
        $product->long_description      = $request->long_description;
        // $product->hit_count             = $request->hit_count;
        // $product->sales_count           = $request->sales_count;
        // $product->featured_status       = $request->featured_status;
        $product->status                = $request->status;
        $product->image                 =$this->getImageUrl($request->file('product_image') ??  null ,' upload/product-image/');
        $product->save();

        // Handle multiple images
        $otherImageFiles = $request->file('other_image');

        foreach ($otherImageFiles as $file) {
            $otherImage = new OtherImage();
            $otherImage->product_id = $product->id;
            $otherImage->image      = $this->getImageUrl($file, 'upload/other/images/');
            $otherImage->save();
            // $otherImages[] = $this->getImageUrl($file, 'upload/other/images/');
        }

        return redirect()->back()->with('message','product added successfull');

    }

    public function getSubCategoryByCategory($id){
        $data = SubCategory::where('category_id',$id)->get();
        return response()->json([
            "status"=>"success",
            "data"=>$data
        ],200);

    }

    public function manage(){
        $products = Product::with([
            'category',
            'subCategory',
            'otherImage',
            'brand',
            'unit',


            ])->get();
        // return response()->json([
        //     "data"=> $products,
        // ]);
        return view('admin.product.manage',compact('products'));
    }
    public function details($id){
        $product = Product::with([
            'category',
            'subCategory',
            'otherImage',
            'brand',
            'unit',


            ])->find($id);

            return view('admin.product.details',compact('product'));
    }

    public function edit($id){
        $product          = Product::find($id);
        $categories       = Category::all();
        $subCategories    = SubCategory::where('category_id',$product->category_id)->get();
        $brands           = Brand::all();
        $units            = Unit::all();

        return view('admin.product.edit',compact('product','categories','subCategories','brands','units'));

    }
    
    public function update(Request $request,$id){
        $update                         = Product::find($id);
        $update->name                   = $request->product_name;
        $update->category_id            = $request->category_id;
        $update->sub_category_id        = $request->sub_category_id;
        $update->brand_id               = $request->brand_id;
        $update->code                   = $request->product_code;
        $update->model                  = $request->product_model;
        $update->stock_amount           = $request->stock_amount;
        $update->regular_price          = $request->regular_price;
        $update->selling_price          = $request->selling_price;
        $update->short_description      = $request->short_description;
        $update->long_description       = $request->long_description;
        $update->status                 = $request->status;
        
        // if($request->hasFile('product_image')){
        //     if(file_exits(public_path($update->image)) && isset($update->image)){
        //         File::delete(public_path($update->image));
        //     }                   
        //     $update->image = $this->getImageUrl($request->file('product_image') ??  null ,' upload/product-image/');
        // }
        if ($request->hasFile('product_image')) {
            if (file_exists(public_path($update->image)) && isset($update->image)) {
                File::delete(public_path($update->image));
            }
        
            $update->image = $this->getImageUrl($request->file('product_image') ?? null, 'upload/product-image/');
        }


        if($request->file('other_image')){
            $otherImages = OtherImage::where('product_id',$id)->get();
            foreach( $otherImages as $image){
                if(file_exists(public_path($image->image)) && isset($image->image)){
                    File::delete(public_path($image->image));
                }        
                 
            }
            // Handle multiple images
        $otherImageFiles = $request->file('other_image');

        foreach ($otherImageFiles as $file) {
            $otherImage = new OtherImage();
            $otherImage->product_id =  $update->id;
            $otherImage->image      = $this->getImageUrl($file, 'upload/other/images/');
            $otherImage->save();
            // $otherImages[] = $this->getImageUrl($file, 'upload/other/images/');
        }

    }
    $update->save();

    return redirect('/product/manage')->with('message','Product Update Successfull');
        
      

    }

    public function delete($id){
        $product = Product::find($id);
        if(file_exists($product->image)){
            unlink($product->image);
        }
        $otherImage = OtherImage::where('product_id',$id)->get();
        foreach( $otherImage as $image){
            if(file_exists($image->image)){
                unlink($image->image);
            }
            $image->delete();
        }

        $product->delete();
        return redirect('/product/manage')->with('message','Product Delete Successfull');
    }
}
