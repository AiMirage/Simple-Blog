<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Psy\Util\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function save(array $options = [])
    {
        if (empty($this->api_token)) {
            $this->api_token = \Illuminate\Support\Str::random(60);
        }
        return parent::save($options);
    }

    public function posts()
    {
        return $this->hasMany(App\Models\Post::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(App\Models\Comment::class, 'user_id');
    }
}
