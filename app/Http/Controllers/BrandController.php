<?php

namespace App\Http\Controllers;

use App\Http\Traits\imageTraits;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    // use imageTraits;
    public function index(){
        return view('admin.brand.index');
    }

    public function manage(){
        $brands = Brand::all();
        return view('admin.brand.manage',compact('brands'));
    }

    public function create(Request $request){

        $brand = new Brand();

        $brand->name        = $request->name;
        $brand->description = $request->description;
        $brand->status      = $request->status;
        // $brand->image       = $this->getImageUrl($request->file('image') ?? null, 'upload/brand/');
        $brand->save();

        return redirect()->route('brand.manage')->with('message','Brand added successfull');

    }

    public function edit($id){
        $brand = Brand::find($id);

        return view('admin.Brand.edit',compact('brand'));
    }

    public function update(Request $request,$id){
        $brand = Brand::find($id);

        $brand->name        = $request->name;
        $brand->description = $request->description;
        $brand->status      = $request->status;

        // if($request->hasFile('image')){
        //     if(file_exists(public_path($brand->image)) && isset( $brand->image)){
        //         File::delete(public_path($brand->image));
        //     }

        //     $brand->image = $this->getImageUrl($request->file('image') ?? $brand->image, 'upload/brand/');
        // }
        $brand->save();

        return redirect()->route('brand.manage')->with('message','Brand Update Successfull');


    }

    public function delete($id){
        $data = Brand::find($id);
        // if(file_exists($data->image)){
        //     unlink($data->image);
        // }
        $data->delete();

        return redirect()->route('brand.manage')->with('message','Brand Delete successfull');

    }
}
