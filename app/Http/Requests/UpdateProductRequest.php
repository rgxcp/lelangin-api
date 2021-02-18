<?php

namespace App\Http\Requests;

use App\Traits\FailedFormValidation;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'account_id' => [
                'bail',
                'filled',
                'integer',
                'exists:accounts,id'
            ],
            'name' => [
                'bail',
                'filled',
                'string',
                'max:50'
            ],
            'description' => [
                'bail',
                'filled',
                'string'
            ],
            'auction_opened_at' => [
                'bail',
                'filled',
                'date',
                'after:' . now()
            ],
            'auction_closed_at' => [
                'bail',
                'filled',
                'date',
                'after:auction_opened_at'
            ],
            'bid_started_at' => [
                'bail',
                'filled',
                'integer',
                'gte:0'
            ],
            'bid_multiplied_by' => [
                'bail',
                'filled',
                'integer',
                'gte:1000',
                'exclude_if:buyout_price,null',
                'lt:buyout_price'
            ],
            'buyout' => [
                'bail',
                'filled',
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
}
