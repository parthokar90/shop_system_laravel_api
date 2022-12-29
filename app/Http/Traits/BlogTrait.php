<?php 

namespace app\Http\Traits;

use App\Models\admin\Blog;

trait BlogTrait{

    public function blogList(){

        $data = Blog::with('createdBy:id,name','category:id,category_name')->where('status',1)->get();

        return response()->json([
            'status'=>200,
            'data'=>$data,
        ]);
    }

    public function blogShow($id){

        $data = Blog::with('createdBy:id,name','category:id,category_name')->where('status',1)->where('id',$id)->first();

        return response()->json([
            'status'=>200,
            'data'=>$data,
        ]);
    }
}