<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;

class CheckoutValidateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'mobile' => 'required',
            'country' => 'required',
            'address' => 'required',
            'city' => 'required',
            'post' => 'required',
            'email' => 'required',
            'coupon' => 'required',
        ];

    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([

            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }


      /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'coupon.required' => 'Coupon is required!'
        ];
    }
}
