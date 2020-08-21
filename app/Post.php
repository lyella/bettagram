<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //relational of user and its posts

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
