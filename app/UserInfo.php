<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->hasOne('App\Models\Post');
    }
}
