<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //un post pertence a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //un post pertence a una categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //post tiene muchos comentarios | metodo, relacion polimorfica | commentable es el prefijo
    public function comments()
    {
        //esto es basicamente un hashMany, solo que es polimorfico | tiene muchos
        return $this->morphMany(Comment::class, 'commentable');
        //esto se va a autocompletar EJ: commentable_id y commentable_type
    }

    //post tiene una unica imagen
    public function image()
    {
        //esto es basicamente un hashOne, solo que es polimorfico
        return $this->morphOne(Image::class, 'imageable');
    }

    //post tiene muchas etiquetas
    public function tags()
    {
        //muchos a muchos polimorfico y transformate para muchos
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
