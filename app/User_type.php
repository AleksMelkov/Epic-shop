<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
    protected $table = 'user_types';

    protected $fillable = ['user_type_name'];

    public function user() {
        return $this->hasOne('App\User', 'user_type_id', 'id');
    }
}
