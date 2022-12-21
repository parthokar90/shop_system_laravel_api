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
        return Brand::where('status',1)->get();
    }


}