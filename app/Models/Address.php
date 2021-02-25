<?php

namespace App\Models;

use App\Traits\SerializeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory, SerializeDate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'label',
        'recipient',
        'detail',
        'phone_number'
    ];

    public function owner()
    {
        return $this->user_id === request()->user()->id;
    }
}
