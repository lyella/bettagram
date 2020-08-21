<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot ()
    {
        parent::boot();

        static::created(function ($user){
            $user ->profile()->create([
                'title' => $user->username //accessing the profile of the user
            ]); 
        });
    }


    public function posts ()
    {
        return $this->hasMany(Post::class)->orderBy('created_at','DESC'); //order by latest post
    }

    public function following()
    {
        {
            return $this->belongsToMany(Profile::class);
        }
    }
    // To transfer the User data to Profile or vice versa. AKA Relantional functionality in Laravel.

    public function profile ()
    {
        return $this->hasOne(Profile::class);
    }
}
