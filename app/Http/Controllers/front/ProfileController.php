<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\http\Traits\ProfileTrait;

use App\Http\Requests\ProfileValidateRequest;

class ProfileController extends Controller
{

    use ProfileTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->profile();
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileValidateRequest $request, $id)
    {
        return $this->profileUpdate($request, $id);
    }

}
