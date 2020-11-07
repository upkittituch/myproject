<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('product',compact('products'));
    }
    public function show($id){
        $product = Product::find($id);
        $productFromSameCategories = Product::inRandomOrder()
            ->where('category_id',$product->category_id)
            ->where('id','!=',$product->id)
            ->limit(3)
            ->get();

        return view('show',compact('product','productFromSameCategories'));
    }
    public function filter($name,Request $request ){
        $category  = Category::where('name',$name)->first();
        $categoryId = $category->id;
    
            
        if($request->min||$request->max){
            $products = $this->filterByPrice($request);

        }else{
            $products = Product::where('category_id',$category->id)->get();
        }
            
           

        return view('product',compact('products'));
    }
    public function filterName($name,Request $request ){
        $products  = Product::where('name',$name)->first();
        return view('product',compact('products'));
    }
    public function thankyou(){
        
        return view ('thankyou');
    }
   
   
    
}
