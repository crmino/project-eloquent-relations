<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //perfil tiene una localizacion
    public  function location()
    {
        return $this->hasOne(Location::class);
    }
}
