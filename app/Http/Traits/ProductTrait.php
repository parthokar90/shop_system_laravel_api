<?php 

namespace App\Http\Traits;

use App\Models\admin\Product;

trait ProductTrait{

    public function productList(){

       return Product::select('id','product_name','product_slug','quantity',
       'alert_quantity','regular_price','sale_price','image','tag','is_featured','stock_status','dimension','short_description','long_description','brand_id','category_id')
       ->with('category:id,category_name','brand:id,brand_name')
       ->orderBy('id','DESC')
       ->get();

    }

    public function productDetails($id){

        return Product::where('id',$id)->select('id','product_name','product_slug','quantity',
        'alert_quantity','regular_price','sale_price','image','tag','is_featured','stock_status','dimension','short_description','long_description','brand_id','category_id')
        ->with('category:id,category_name','brand:id,brand_name')
        ->first();
           
    }
}