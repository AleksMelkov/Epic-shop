<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['coupon_name'];

    public function user() {
        return $this->hasOne('App\User', 'user_type_id', 'id');
    }
}
