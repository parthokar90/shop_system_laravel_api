<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\admin\Order;

class OrderController extends Controller
{
    public function order(){

        $data = Order::with('orderItem','orderStatus')->where('customer_id',auth()->user()->id)->orderBy('id','DESC')->get();

        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);

    }
}
