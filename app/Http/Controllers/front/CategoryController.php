<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\http\Traits\CategoryTrait;

use App\Models\admin\Product;

class CategoryController extends Controller
{

    use CategoryTrait;

    /**
     * Show  the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function index(){
        return response()->json([
            'status' => 200,
            'data' => $this->categoryList(),
        ]);
    }

    /**
     * Show the category wise product specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryProduct($id)
    {

        $data = Product::where('category_id',$id)->select('id','product_name','product_slug','image','regular_price','sale_price')->get();

        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);

    }
}
