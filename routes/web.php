<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('coba', function(){
    return view('coba');
});

Route::get('ganti', function(){
    return view('ganti');
});