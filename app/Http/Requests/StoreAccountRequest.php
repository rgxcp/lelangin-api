<?php

namespace App\Http\Requests;

use App\Traits\FailedFormValidation;
use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
{
    use FailedFormValidation;

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

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function () {
            $this->merge([
                'user_id' => $this->user()->id
            ]);
        });
    }
}
