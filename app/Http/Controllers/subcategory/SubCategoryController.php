<?php

namespace App\Http\Controllers\subcategory;

use App\Http\Controllers\Controller;
use App\Http\Traits\imageTraits;
use App\Models\category\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SubCategoryController extends Controller
{
    // use imageTraits;
    public function index(){
        return view('admin.subcategory.index',['categories'=>Category::all()]);
    }

    public function manage(){
        return view('admin.subcategory.manage',['subcategories'=>SubCategory::with(['category'])->get()]);

    }

    public function create(Request $request){
        $subCategory = new SubCategory();

        $subCategory->name        = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->description = $request->description;
        $subCategory->status      = $request->status;
        // $subCategory->image       = $this->getImageUrl($request->file('image') ??  null ,' upload/sub-category-image/');
        $subCategory->save();

        if($subCategory){
            //return response()->json(['success' => 'Sub Category Added successfully']);

            return redirect('/subcategory/manage')->with('message','Sub Category Added successfully');

        }
        else{
            //return response()->json(['success' => 'Sub Category Added failed']);
            // return redirect('/subcategory/add');
            return redirect('/subcategory/manage')->with('error','Sub Category Added failed');

        }

    }

    public function edit($id){

        $categories = Category::all();
        $subCategory = SubCategory::with(['category'])->find($id);

        return view('admin.subcategory.edit',compact('subCategory','categories'));
    }

    public function update(Request $request,$id){

        $subCategory = SubCategory::find($id);

        $subCategory->name          = $request->name;
        $subCategory->category_id   = $request->category_id;
        $subCategory->description   = $request->description;
        $subCategory->status        = $request->status;
        // if($request->hasFile('image')){
        //     if(file_exists(public_path($subCategory->image)) && isset($subCategory->image)){
        //         File::delete(public_path( $subCategory->image));
        //     }
        //     $subCategory->image = $this->getImageUrl($request->file('image') ??   $subCategory->image ,' upload/category-image/');
        // }
        $subCategory->save();

        return redirect('/subcategory/manage')->with('message','Sub-Category Update Successfull');

    }

    public function delete($id){
        $subCategory = SubCategory::find($id);
        if(file_exists($subCategory ->image)){
            unlink($subCategory ->image);
        }
        $subCategory->delete();

        return redirect('/subcategory/manage')->with('message','delete successfull');
    }
}
