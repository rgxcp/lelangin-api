<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
                Rule::exists('accounts', 'id')->where(function ($query) {
                    return $query->where('user_id', $this->user()->id);
                })
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
                'gte:1000'
            ],
            'buyout' => [
                'bail',
                'required',
                'boolean'
            ],
            'buyout_price' => [
                'bail',
                'exclude_if:buyout,false,0,null',
                'filled',
                'required_if:buyout,true,1',
                'integer',
                'gt:bid_started_at',
                'gt:bid_multiplied_by'
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
            if ($this->buyout_price && $this->buyout == false) {
                $this->offsetUnset('buyout_price');
            }
        });
    }
}
