<?php

namespace App\Models;

use App\Traits\SerializeDate;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SerializeDate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'username',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email',
        'password'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_picture'
    ];

    public function self()
    {
        return $this->id === request()->user()->id;
    }

    // Relationships
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function sellerInvoices()
    {
        return $this->hasMany(Invoice::class, 'seller');
    }

    public function buyerInvoices()
    {
        return $this->hasMany(Invoice::class, 'buyer');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Accessors
    public function getProfilePictureAttribute()
    {
        return 'https://ui-avatars.com/api/?name='
            . preg_replace('/\s+/', '+', $this->full_name)
            . '&size=512';
    }

    public function getTokenAttribute()
    {
        return $this->createToken(request()->device ?? 'Unknown Device');
    }

    // Mutator
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
