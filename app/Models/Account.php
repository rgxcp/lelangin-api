<?php

namespace App\Models;

use App\Traits\SerializeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory, SerializeDate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'bank_id',
        'holder',
        'number'
    ];

    // Relationships
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
