<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('coba', function(){
    return view('coba');
});

Route::get('apa', function(){
    return view('coba');
});
