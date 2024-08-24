<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    // return redirect()->route('contact2');
    // return to_route('contact2'); // Esta es la mejor y la mas corta
    // $data = ['name' => 'Stonxz'];
    return view('contact', ['name' => 'Stonxz']);
})->name('contact');;


Route::get('/contact2', function () {
    return view('contact2', ['age' => '21']);
})->name('contact2');

Route::get('/test', function () {
    return view('test');
});

Route::get('/crud', function () {
    $age = 21;
    $data = ['name' => 'Jorge', 'age' => $age];

    return view('crud/index', $data);
})->name('crud');//Ruta con nombre
