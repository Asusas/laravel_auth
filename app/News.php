<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news_items';

    public function cat()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment', 'news_id', 'id');
    }

}