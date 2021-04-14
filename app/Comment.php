<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function commentable()
    {
        //uno a uno o uno a muchos con polimorfico
        //morphTo = transformar a | cambiar a
        //sin especificar nada, queda relacionado con los otros metodos
        return $this->morphTo();
    }

    //un comentario pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class); //use_id
    }
}
