<?php

namespace App\Http\Requests\Api;

use App\Traits\JSONResponseRequest;
use Illuminate\Foundation\Http\FormRequest;

class MessageCtaStoreRequest extends FormRequest
{
    use JSONResponseRequest;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [ 'required', 'email', 'max:100' ]
        ];
    }
}
