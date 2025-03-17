<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function(){
    return view('admin/home');
});

Route::get('adddosen', function(){
    return view('admin/adddosen');
});

Route::get('isoh', function(){
    return view('layout/navbaradmin');
});

Route::get('ganti', function(){
    return view('ganti');
});