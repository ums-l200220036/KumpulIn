<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('coba', function(){
    return view('admin/home');
});

Route::get('apa', function(){
    return view('coba');
});

Route::get('isoh', function(){
    return view('layout/navbaradmin');
});

Route::get('ganti', function(){
    return view('ganti');
});