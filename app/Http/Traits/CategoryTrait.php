<?php 

namespace App\Http\Traits;

use App\Models\admin\Category;

use App\Models\admin\Product;

trait CategoryTrait{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryList()
    {
        $data = Category::with('subCategory')->whereNull('parent_id')->where('status',1)->get();

        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }

    public function categoryProductData($id){

        $data = Product::where('category_id',$id)->select('id','product_name','product_slug','image','regular_price','sale_price')->get();

        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }
}