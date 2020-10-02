<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','desc','price','category_id','image'];
    public function category(){
    	return $this->hasOne(Category::class,'id','category_id');
    }
}
