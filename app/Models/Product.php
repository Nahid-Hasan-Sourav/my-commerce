<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
use App\Models\category\Category as CategoryCategory;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function category(){
        return $this->belongsTo(CategoryCategory::class,'category_id','id');
    }
    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id');
    }
    public function otherImage(){
        return $this->hasMany(OtherImage::class,'product_id','id');
    }
    


}
