<?php

namespace App\Http\Controllers\subcategory;

use App\Http\Controllers\Controller;
use App\Http\Traits\imageTraits;
use App\Models\category\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{    
    use imageTraits;
    public function index(){
        return view('admin.subcategory.index',['categories'=>Category::all()]);
    }

    public function manage(){
        return view('admin.subcategory.manage');
    }

    public function create(Request $request){
        $subCategory = new SubCategory();

        $subCategory->name        = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->description = $request->description;
        $subCategory->status      = $request->status;
        $subCategory->image       = $this->getImageUrl($request->file('sub_category_image') ??   $subCategory->image ,' upload/sub-category-image/');
        $subCategory->save();

        return redirect('/subcategory/add')->with('message','Category Info Update Successfully');
    }
}
