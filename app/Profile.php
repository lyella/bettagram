<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
protected $guarded = [];

public function profileImage()
{
    $imagePath = ($this->image)? $this->image : 'profile/default.png';

    return '/storage/' .$imagePath;
}

public function followers()
{

    {
        return $this->belongsToMany(User::class);
    }
}
    // To transfer the User data to Profile or vice versa. We will do a public function
    public function user() 
    {
        return $this->belongsTo(User::class); //built in functionality of Laravel
    }
}
