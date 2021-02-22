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

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'winned_as_buyout' => 'boolean'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'as'
    ];

    // Scopes
    public function scopeAsSeller($query)
    {
        return $query->where('seller', request()->user()->id);
    }

    public function scopeAsBuyer($query)
    {
        return $query->where('buyer', request()->user()->id);
    }

    // Relationships
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer');
    }

    // Accessors
    public function getAsAttribute()
    {
        return $this->seller === request()->user()->id
            ? 'Seller'
            : 'Buyer';
    }
}
