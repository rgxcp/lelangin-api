<?php

namespace App\Http\Requests;

use App\Traits\FailedFormValidation;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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
            'label' => [
                'bail',
                'filled',
                'string',
                'max:20'
            ],
            'recipient' => [
                'bail',
                'filled',
                'string',
                'max:30'
            ],
            'detail' => [
                'bail',
                'filled',
                'string',
                'max:150'
            ],
            'phone_number' => [
                'bail',
                'filled',
                'string',
                'max:12'
            ]
        ];
    }
}
