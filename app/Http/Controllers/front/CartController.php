<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\CartValidationRequest;

use App\Http\Traits\CartTrait;


class CartController extends Controller
{

    use CartTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'status' => 200,
            'message' => 'Data Found',
            'data' => $this->cartItem(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartValidationRequest $request)
    {
        return $this->cartStore($request);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CartValidationRequest $request, $id)
    {
        return $this->cartUpdate($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cartDelete($id);
        return response()->json([
            'status' => 200,
            'message' => 'Item has been deleted',
        ]);
    }
}
