<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;

class ProfileValidateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'gender' => 'required',
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
            'name.required' => 'Name is required!',
            'mobile.required' => 'Mobile is required!',
            'address.required' => 'Address is required!',
            'city.required' => 'City is required!',
            'zip_code.required' => 'Zip code is required!',
            'gender.required' => 'Gender is required!'
        ];
    }
}
