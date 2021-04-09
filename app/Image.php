<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    public function imageable()
    {
        //uno a muchos con polimorfico
        //morphTo = transformar a
        //sin especificar nada, queda relacionado con los otros metodos
        return $this->morphTo();
    }

}
