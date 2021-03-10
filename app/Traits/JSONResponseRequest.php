<?php

namespace App\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

trait JSONResponseRequest
{
    public function failedValidation(Validator $validator) {
        $response = [
            'status' => 400,
            'message' => implode('<br>', $validator->messages()->all()),
            'data' => null
        ];

       throw new HttpResponseException(response()->json($response, 400));
   }
}