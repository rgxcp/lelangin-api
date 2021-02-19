<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'full_name' => [
                'bail',
                'required',
                'string',
                'max:30'
            ],
            'username' => [
                'bail',
                'required',
                'alpha_dash',
                'max:20',
                'unique:users,username'
            ],
            'email' => [
                'bail',
                'required',
                'email',
                'max:30',
                'unique:users,email'
            ],
            'password' => [
                'bail',
                'required',
                'string',
                'min:8',
                'max:72',
                'different:full_name',
                'different:username',
                'different:email'
            ]
        ];
    }
}
