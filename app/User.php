<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    //tiene un perfil
    public  function profile()
    {
        return $this->hasOne(Profile::class);
    }

    //expresamos que un usuario pertenece a un level
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    //tiene muchos grupos
    public function groups()
    {
        //belongsToMany = pertence y tiene muchos
        return $this->belongsToMany(Group::class);
    }

    //un user tiene una location a traves de profile
    public  function location()
    {
        //tengo UNA a traves de PROFILE, ¿que cosa? una location
        return $this->hasOneThrough(Location::class, Profile::class);
    }

    //user puede tener muchos posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //user puede tener muchos videos
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    //user puede tener muchos commets
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //tiene una imagen de perfil
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
