<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;

class OrderTrackValidateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'invoice_no' => 'required',
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
            'invoice_no.required' => 'Invoice no is required!'
        ];
    }
}
