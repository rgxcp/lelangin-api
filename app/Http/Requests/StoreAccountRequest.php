<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
{
    use FailedValidation;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bank_id' => [
                'bail',
                'required',
                'integer',
                'exists:banks,id'
            ],
            'holder' => [
                'bail',
                'required',
                'string',
                'max:30'
            ],
            'number' => [
                'bail',
                'required',
                'string',
                'max:16',
                'unique:accounts,number'
            ]
        ];
    }
}
