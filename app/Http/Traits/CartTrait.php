<?php 

namespace App\Http\Traits;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\admin\Cart;

use App\Models\admin\Product;

use Carbon\Carbon;

trait CartTrait{

    public function cartItem(){
       return Cart::with('product')->where('user_id',auth()->user()->id)->get();
    }

    public function cartStore($request){

        try {
            
            $product = Product::where('id',$request->product_id)->select('id','sale_price')->first();

            if(!isset($product)){
                return response()->json([
                    'status' => false,
                    'message' => 'Unknown product selection',
                ], 401);
            }

            Cart::where(['user_id'=>auth()->user()->id,'product_id'=>$request->product_id])->delete();

            Cart::insert([
                'user_id'      => auth()->user()->id,
                'product_id'   => $request->product_id,
                'quantity'     => $request->quantity,
                'price'        => $product->sale_price,
                'sub_total'    => $product->sale_price*$request->quantity,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now()
            ]);


            return response()->json([
                'status' => true,
                'message' => 'Item added to cart successfully',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function cartUpdate($request,$id){

        try {

            $cartData =  Cart::find($id);

            if(!isset($cartData)){
                return response()->json([
                    'status'  => false,
                    'message' => 'Unknown cart id',
                ], 401);
            }

            $product = Product::where('id',$cartData->product_id)->select('id','sale_price')->first();

            if(!isset($product)){
                return response()->json([
                    'status'  => false,
                    'message' => 'Unknown product selection',
                ], 401);
            }

            Cart::find($id)->update([
                'user_id'    => auth()->user()->id,
                'product_id' =>$cartData->product_id,
                'quantity'   =>$request->quantity,
                'price'      => $product->sale_price,
                'sub_total'  => $product->sale_price*$request->quantity,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);


            return response()->json([
                'status' => true,
                'message' => 'Item updated to cart successfully',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function cartDelete($id){

        return Cart::find($id)->delete();
    }

    public function cartTotal($id){

      
    }


}