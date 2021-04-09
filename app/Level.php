<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //relacion
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public  function posts()
    {
        //tengo MUCHOS a traves de USUARIOS
        return $this->hasManyThrough(Post::class, User::class);
    }

    public  function videos()
    {
        //tengo MUCHOS a traves de USUARIOS
        return $this->hasManyThrough(Video::class, User::class);
    }
}
