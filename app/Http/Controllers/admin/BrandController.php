<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Traits\BrandTrait;

class BrandController extends Controller
{

    use BrandTrait;

    public function __construct()
    {
       $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update','delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return $this->brandList();
    }

    /**
     * Show the brand wise product specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function brandProduct($id)
    {
        return $this->brandProducts($id);
    }

}
