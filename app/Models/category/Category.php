<?php

namespace App\Models\category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','image','status'];
    private static $category,$image,$extension,$imageName,$directory,$imageUrl;

    public static function geImageUrl($request){
        if($request->hasFile('category_image')){
            self::$image = $request->file('category_image');
            self::$extension = self::$image->getClientOriginalExtension();
            // self::$imageName = self::time().'.'.self::$extension;
            self::$imageName = time() . '.' . self::$extension;
            self::$directory = 'upload/category-image/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl = self::$directory.self::$imageName;
            return self::$imageUrl ?? null;
        }
    }
    public static function newCategory($request){
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description ?? null;
        self::$category->status = $request->status ?? 1;
        self::$category->image = self::geImageUrl($request);
        self::$category->save();
    }
}
