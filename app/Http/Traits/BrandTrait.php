<?php 

namespace App\Http\Traits;

use App\Models\admin\Brand;

use App\Models\admin\Product;

trait BrandTrait {


  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brandList()
    {
        $data = Brand::where('status',1)->get();

        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }

    public function brandProducts($id){

        $data = Product::where('brand_id',$id)->select('id','product_name','product_slug','image','regular_price','sale_price')->get();

        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);

    }


}