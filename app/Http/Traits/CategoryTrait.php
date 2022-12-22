<?php 

namespace App\Http\Traits;

use App\Models\admin\Category;

trait CategoryTrait{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryList()
    {
        return Category::with('subCategory')->whereNull('parent_id')->where('status',1)->get();
    }
}