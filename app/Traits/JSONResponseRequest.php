<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait JSONResponseRequest
{
    public function failedValidation(Validator $validator)
    {
        $response = [
            'status' => 400,
            'message' => $validator->messages(),
            'data' => null,
        ];

        throw new HttpResponseException(response()->json($response, 400));
    }
}
