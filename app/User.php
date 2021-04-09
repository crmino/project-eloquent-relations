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


    public  function profile()
    {
        return $this->hasOne(Profile::class);
    }

    //expresamos que un usuario pertenece a un level
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function groups()
    {
        //belongsToMany = pertence y tiene muchos
        return $this->belongsToMany(Group::class);
    }

    public  function location()
    {
        //tengo UNA a traves de PROFILE, ¿que cosa? una location
        return $this->hasOneThrough(Location::class,Profile::class);
    }
}
