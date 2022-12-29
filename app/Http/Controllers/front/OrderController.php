<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\admin\Order;

use App\Http\Requests\OrderTrackValidateRequest;
use App\Http\Requests\CheckoutValidateRequest;



class OrderController extends Controller
{

    /**
     * Show  the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(){

        $data = Order::select('id','invoice_no','ship_address','ship_location','bill_address',
        'bill_location','delivery_charge','accepted_date','delivered_date','return_date','coupon_id',
        'status_id','customer_id')
        ->with('customer:id,name','orderItem:id,order_id,quantity',
         'orderStatus:id,status_name','coupon:id,type,amount','product:id,
          product_name,sale_price,image')
        ->where('customer_id',auth()->user()->id)
        ->orderBy('id','DESC')->get();

        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }



    /**
     * Show  the specified resource id wise.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orderDetails($id){

        $data = Order::select('id','invoice_no','ship_address','ship_location','bill_address',
        'bill_location','delivery_charge','accepted_date','delivered_date','return_date',
        'coupon_id','status_id','customer_id')
        ->with('customer:id,name','orderItem:id,order_id,quantity','orderStatus:id,status_name',
        'coupon:id,type,amount','product:id,product_name,sale_price,image')
        ->where('id',$id)
        ->first();
        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }



    /**
     * Show id and status wise update specified resource.
     *
     * @param  int  $id
     * @param  int  $status
     * @return \Illuminate\Http\Response
     */
    public function orderStatusChange($id,$status){

       Order::where('id',$id)->update([
          'status_id'=>$status,
          'return_by'=>auth()->user()->id,
          'return_reason'=>'Return from customer end',
       ]);
       return response()->json([
        'status' => 200,
        'message' => 'Product has been returned successfully',
      ]);
    }


    /**
     * track order invoice wise.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderTrack(OrderTrackValidateRequest $request){

        $data = Order::select('id','invoice_no','ship_address','ship_location','bill_address','bill_location','delivery_charge','accepted_date','delivered_date','return_date','coupon_id','status_id','customer_id')
        ->with('customer:id,name','orderItem:id,order_id,quantity','orderStatus:id,status_name','coupon:id,type,amount','product:id,product_name,sale_price,image')
        ->where('invoice_no',$request->invoice_no)
        ->first();

        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }


      /**
     * track order invoice wise.
     *
     * @return \Illuminate\Http\Response
     */

     public function checkOut(CheckoutValidateRequest $request){
          
     }



}
