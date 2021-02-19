<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'account_id' => [
                'bail',
                'required',
                'integer',
                'exists:accounts,id'
            ],
            'name' => [
                'bail',
                'required',
                'string',
                'max:50'
            ],
            'description' => [
                'bail',
                'required',
                'string'
            ],
            'auction_opened_at' => [
                'bail',
                'required',
                'date',
                'after:' . now()
            ],
            'auction_closed_at' => [
                'bail',
                'required',
                'date',
                'after:auction_opened_at'
            ],
            'bid_started_at' => [
                'bail',
                'required',
                'integer',
                'gte:0'
            ],
            'bid_multiplied_by' => [
                'bail',
                'required',
                'integer',
                'gte:1000',
                'exclude_if:buyout_price,null',
                'lt:buyout_price'
            ],
            'buyout' => [
                'bail',
                'required',
                'boolean'
            ],
            'buyout_price' => [
                'bail',
                'filled',
                'required_if:buyout,true,1',
                'integer'
            ],
            'images' => [
                'bail',
                'filled',
                'array',
                'max:5'
            ],
            'images.*' => [
                'bail',
                'filled',
                'image',
                'max:2048',
                'distinct'
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
