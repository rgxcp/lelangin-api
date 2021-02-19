<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'label' => [
                'bail',
                'required',
                'string',
                'max:20'
            ],
            'recipient' => [
                'bail',
                'required',
                'string',
                'max:30'
            ],
            'detail' => [
                'bail',
                'required',
                'string',
                'max:150'
            ],
            'phone_number' => [
                'bail',
                'required',
                'string',
                'max:12'
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
