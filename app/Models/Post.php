<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'content'
    ];

    public function user()
    {
        return $this->hasOne(App\User::class, 'user_id');
    }

    public function comments() {
        return $this->hasMany(App\Models\Comment::class , 'post_id');
    }
}
