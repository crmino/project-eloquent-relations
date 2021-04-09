<?php

Route::get('/', function () {
    $users=App\User::get();

    return view('welcome',['users'=>$users]);
});
