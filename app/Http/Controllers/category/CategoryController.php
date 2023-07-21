<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use App\Models\category\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categories;
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
}
