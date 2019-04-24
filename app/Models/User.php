<?php

namespace App\Models;

use App\Models\Tour;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tourFavorites(){
        return $this->belongsToMany(Tour::class, 'user_favorites');
    }

    public function tourRates(){
        return $this->belongsToMany(Tour::class, 'user_rates');
    }

    public function userBookings(){
        return $this->belongsToMany(Tour::class, 'user_bookings');
    }

}
