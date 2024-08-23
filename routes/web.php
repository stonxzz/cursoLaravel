<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/crud', function () {
    $age = 21;
    $data = ['name' => 'Jorge', 'age' => $age];

    return view('crud/index', $data);
})->name('crud');//Ruta con nombre
