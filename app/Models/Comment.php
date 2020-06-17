<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function by()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
