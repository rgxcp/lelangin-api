<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => [
                'bail',
                'required',
                'alpha_dash',
                'max:20',
                'exists:users,username'
            ],
            'password' => [
                'bail',
                'required',
                'string',
                'min:8',
                'max:72'
            ]
        ];
    }
}
