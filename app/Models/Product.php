<?php

namespace App\Models;

use App\Traits\SerializeDate;
use Carbon\Carbon;
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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'auction_status',
        'auction_opened_at_timestamp',
        'auction_closed_at_timestamp'
    ];

    // Scopes
    public function scopeAuctionStatusNotEnded($query)
    {
        return $query->where('auction_closed_at', '>', now());
    }

    // Relationships
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    // Accessors
    public function getAuctionStatusAttribute()
    {
        $now = now();

        switch ($now) {
            case $now < $this->auction_opened_at:
                return 'Closed';
                break;
            case $now > $this->auction_closed_at:
                return 'Ended';
                break;
            default:
                return 'Opened';
        }
    }

    public function getAuctionOpenedAtTimestampAttribute()
    {
        return Carbon::parse($this->auction_opened_at)->diffForHumans();
    }

    public function getAuctionClosedAtTimestampAttribute()
    {
        return Carbon::parse($this->auction_closed_at)->diffForHumans();
    }
}
