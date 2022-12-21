<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\admin\Product;

use App\Http\Traits\BrandTrait;

class BrandController extends Controller
{

    use BrandTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         return response()->json([
                'status' => 200,
                'message' => 'Data Found',
                'data' => $this->brandList(),
          ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function brandProduct($id)
    {

        $data = Product::where('brand_id',$id)->select('id','product_name','product_slug','image','regular_price','sale_price')->get();

        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);

    }

}
