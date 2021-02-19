<?php

namespace App\Models;

use App\Traits\SerializeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory, SerializeDate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'seller',
        'buyer',
        'address_id',
        'product_id',
        'winned_at',
        'winned_as_buyout',
        'winned_at_price'
    ];
}
