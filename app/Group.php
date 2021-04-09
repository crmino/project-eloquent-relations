<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    public function users()
    {
        //belongsToMany = pertence y tiene muchos
        //un grupo tiene y pertenece a muchos usuarios
        return $this->belongsToMany(User::class)
            //->whithTimestamps , para que se llene automaticamente en db
            ->withTimestamps();
    }
}
