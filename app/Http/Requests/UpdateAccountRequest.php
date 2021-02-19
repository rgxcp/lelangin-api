<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
                'filled',
                'integer',
                'exists:banks,id'
            ],
            'holder' => [
                'bail',
                'filled',
                'string',
                'max:30'
            ],
            'number' => [
                'bail',
                'filled',
                'string',
                'max:16',
                'unique:accounts,number,' . $this->account->id
            ]
        ];
    }
}
