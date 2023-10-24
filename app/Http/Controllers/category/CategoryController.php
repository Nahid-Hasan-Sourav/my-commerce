<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use App\Http\Traits\imageTraits;
use App\Models\category\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    // use imageTraits;
    public function index(){
        return view('admin.category.index');
    }

    public function store(Request $request){
        // return $request->file('category_image');
        Category::newCategory($request);
        
        return back()->with('message','category info create successfully');

    }
    public function manage(){
        // $this->categories = Category::all();
        return view('admin.category.manage',
        [
            'categories'=>Category::all()
        ]
    );
    }

    public function edit ($id){
        $data = Category::find($id);

        return view('admin.category.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $updateData = Category::find($id);

        $updateData->name = $request->name;
        $updateData->description = $request->description;
        $updateData->status = $request->status;

        if($request->hasFile('category_image')){
            if(file_exists(public_path( $updateData->image)) && isset($updateData->image)){
                File::delete(public_path($updateData->image));
            }
            // $updateData->image = $this->getImageUrl($request->file('category_image') ??  $updateData->image ,' upload/category-image/');
        }
        $updateData->save();

        // if($data){
            return redirect('/category/manage')->with('message','Category Info Update Successfully');
        // }
    }

    public function delete($id){
        $exitData = Category::find($id);
        if(file_exists($exitData->image)){
            unlink($exitData->image);
        }
        $exitData->delete();
        return redirect('/category/manage')->with('message','Category Info Delete Successfully');
    }
}
