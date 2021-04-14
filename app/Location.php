<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //esto es necesario solo si quisiera obtener el perfil a traves de la localizacion
    //public function profile(){
    //    return $this->belongsTo(Profile::class);
    //}
}
