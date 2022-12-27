<?php 

namespace App\Http\Traits;

use App\Models\admin\Brand;

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


}