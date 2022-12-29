<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\front\Wishlist;
class WishlistController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Wishlist::select('id','product_id')->where('user_id',auth()->user()->id)->with('product:id,product_name,image,sale_price')->get();

        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addWishlist($id)
    {

        $count = Wishlist::where('user_id',auth()->user()->id)->where('product_id',$id)->count();

        if($count>0){
            return response()->json([
                'status' => 200,
                'message' => 'Product already added to wishlist',
            ]);
        }

        Wishlist::create([
            'user_id'=>auth()->user()->id,
            'product_id'=>$id,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Product has been added to wishlist',
        ]);
    }
}
