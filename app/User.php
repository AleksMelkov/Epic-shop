<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password', 'first_name', 'patronymic', 'last_name', 'phone_number', 'pass_serial', 'pass_number', 'pass_date', 'user', 'user_type_id', 'coupon_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_type() {
        return $this->belongsTo('App\User_type', 'user_type_id', 'id');
    }

    public function coupon() {
        return $this->belongsTo('App\Coupon');
    }
}
