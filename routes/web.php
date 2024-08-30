<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\PrimerControlador;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([TestMiddleware::class])->group(function () {
    Route::get('/test/{id?}/{name?}', function ($id = 10, $name = "jorge") {
        echo $id;
        echo $name;
    });
});

Route::group(['prefix' => 'dashboard'], function () {
    // Route::resource('post', PostController::class);
    // Route::resource('category', CategoryController::class);
    //Agrupar las rutas por tipo recurso
    Route::resources([
        'post' => PostController::class,
        'category' => CategoryController::class,
    ]);
});
//Indica que un parametro es opcional
// Route::get('/test/{id?}/{name?}', function ($id = 10, $name = "jorge") {
//     echo $id;
//     echo $name;
// });

// Route::controller(PostController::class)->group(function () {
//     Route::get('post','index')->name("post.index");
//     Route::get('post/{post}','show')->name("post.show");
//     Route::get('post/create','create')->name("post.create");
//     Route::get('post/{post}/edit','edit')->name("post.edit");

//     Route::post('post','store')->name("post.store");
//     Route::put('post/{post}/edit','update')->name("post.update");
//     Route::delete('post/{post}/edit','delete')->name("post.destroy");
// });



// Route::get('post', [PostController::class, 'index']);
// Route::get('post/{post}', [PostController::class, 'show']);
// Route::get('post/create', [PostController::class, 'create']);
// Route::get('post/{post}/edit', [PostController::class, 'edit']);

// Route::post('post', [PostController::class, 'store']);
// Route::put('post/{post}/edit', [PostController::class, 'update']);
// Route::delete('post/{post}/edit', [PostController::class, 'delete']);
