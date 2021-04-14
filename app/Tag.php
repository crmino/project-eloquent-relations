<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //etiqueta puede tener muchos posts
    public function posts()
    {
        //muchos a muchos polimorfico DESDE la entidad MADRE | transformado para muchos
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function videos()
    {
        //muchos a muchos polimorfico DESDE la entidad MADRE | transformado para muchos
        return $this->morphedByMany(Video::class, 'taggable');
    }

}
