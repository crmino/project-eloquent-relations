<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //relacion
    public function users(){
        return $this->hasMany(User::class);
    }
}
