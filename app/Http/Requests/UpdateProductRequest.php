<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
                'filled',
                'integer',
                Rule::exists('accounts', 'id')->where(function ($query) {
                    return $query->where('user_id', $this->user()->id);
                })
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
                'after_or_equal:' . $this->product->auction_opened_at
            ],
            'auction_closed_at' => [
                'bail',
                'filled',
                'date',
                'after:auction_opened_at',
                'after:' . $this->product->auction_opened_at
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
                'gte:1000'
            ],
            'buyout' => [
                'bail',
                'filled',
                'boolean'
            ],
            'buyout_price' => [
                'bail',
                'exclude_if:buyout,false,0,null',
                'filled',
                'required_if:buyout,true,1',
                'integer',
                'gt:' . ($this->bid_started_at ?? $this->product->bid_started_at),
                'gt:' . ($this->bid_multiplied_by ?? $this->product->bid_multiplied_by)
            ],
            'images' => [
                'bail',
                'filled',
                'array',
                'max:' . (5 - $this->product->images()->count())
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
