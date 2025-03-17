<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin/home');
});

Route::get('dashboard', function(){
    return view('admin/home');
});

Route::get('adddosen', function(){
    return view('admin/adddosen');
});

Route::get('addmahasiswa', function(){
    return view('admin/addmahasiswa');
});

Route::get('ganti', function(){
    return view('ganti');
});