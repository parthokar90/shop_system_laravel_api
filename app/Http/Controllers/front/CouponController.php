<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\CouponValidateRequest;

use App\Models\admin\Coupon;

use Carbon\Carbon;

class CouponController extends Controller
{
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function coupon(CouponValidateRequest $request)
    {

        $checkCoupon = Coupon::where([
            ['coupon','=',$request->coupon],
            ['expire_date','>=',Carbon::now()->toDateString()],
            ['status','=',1]
        ])->count();

        if($checkCoupon==0){
            return response()->json([
                'status' => false,
                'message' => 'Coupon does not exists',
            ], 401);
        }
        $data = Coupon::where([
            ['coupon','=',$request->coupon],
            ['expire_date','>=',Carbon::now()->toDateString()]
        ])->select('type','amount')->first();

        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }
}
