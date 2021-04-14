<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
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

    //tiene muchos comments
    //metodo, relacion polimorfica | commentable es el prefijo
    public function comments()
    {
        //esto es basicamente un hashMany, solo que es polimorfico
        return $this->morphMany(Comment::class, 'commentable');
        //esto se va a autocompletar EJ: commentable_id y commentable_type
    }

    //tiene una unica imagen
    public function image()
    {
        //esto es basicamente un hashOne, solo que es polimorfico
        return $this->morphOne(Image::class, 'imageable');
    }

    //tiene muchas etiquetas
    public function tags()
    {
        //muchos a muchos polimorfico
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
