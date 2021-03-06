<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'category_id'];

    public function getFormattedDate($column, $format = 'd-m-Y H:i:s')
    {
        return Carbon::create($this->$column)->format($format);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function userInfo()
    {
        return $this->belongsTo('App\UserInfo', 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}
