<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\http\Traits\CategoryTrait;



class CategoryController extends Controller
{

    use CategoryTrait;

    public function __construct()
    {
       $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update','delete']]);
    }

    /**
     * Show  the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function index(){
      return $this->categoryList();
    }

    /**
     * Show the category wise product specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryProduct($id)
    {

        return $this->categoryProductData($id);
       
    }
}
