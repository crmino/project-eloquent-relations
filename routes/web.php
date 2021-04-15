<?php

//undefined type ROUTE
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $users = App\User::get();

    return view('welcome', ['users' => $users]);
});

Route::get('/profile/{id}', function ($id) {
    $user = App\User::find($id);

    //trae los posts con los comentarios
    $posts = $user->posts()
        ->with('category', 'image', 'tags')
        ->withCount('comments')->get();
    //trae los posts con los comentarios
    $videos = $user->videos()
        ->with('category', 'image', 'tags')
        ->withCount('comments')->get();

    //enviamos a la vista profile
    return view('profile', [
        'user' => $user,
        'posts' => $posts,
        'videos' => $videos
    ]);
})->name('profile');


Route::get('/level/{id}', function ($id) {
    $level = App\Level::find($id);

    //trae los posts con los comentarios
    $posts = $level->posts()
        ->with('category', 'image', 'tags')
        ->withCount('comments')->get();
    //trae los posts con los comentarios
    $videos = $level->videos()
        ->with('category', 'image', 'tags')
        ->withCount('comments')->get();

    //enviamos a la vista level
    return view('level', [
        'level' => $level,
        'posts' => $posts,
        'videos' => $videos
    ]);
})->name('level');
