<?php

namespace App\Models;

use App\Traits\SerializeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SerializeDate, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'account_id',
        'name',
        'description',
        'auction_opened_at',
        'auction_closed_at',
        'bid_started_at',
        'bid_multiplied_by',
        'buyout',
        'buyout_price'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'buyout' => 'boolean'
    ];

    // Relationships
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
