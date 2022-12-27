<?php 

namespace App\Http\Traits;

use App\Models\User;
use App\Models\admin\UserDetails;

trait ProfileTrait{

   public function profile(){

       $data = User::select('id','name','email')->with('details:user_id,mobile,image,address,city,zip_code,gender')->where('id',auth()->user()->id)->first();

       return response()->json([
        'status'=>200,
        'data'=>$data,
       ]);

   }

   public function profileUpdate($request,$id){

        User::find($id)->update([
            'name' =>$request->name
        ]);

        UserDetails::where('user_id',$id)->update([
            'mobile' =>$request->mobile,
            'address' =>$request->address,
            'city' =>$request->city,
            'zip_code' =>$request->zip_code,
            'gender' =>$request->gender,
        ]);

        return response()->json([
            'status'=>200,
            'message'=>'Profile has been update successfully',
        ]);
    

   }

}