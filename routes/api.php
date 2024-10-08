<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['middleware' => 'auth:sanctum'], function(){
    
    
});
//Se pone antes de definir resources por que si no busca un post con el parametro all
Route::get('category/all', [CategoryController::class, 'all']);

Route::resource('category', CategoryController::class)->except(['create', 'edit']);
Route::resource('post', PostController::class)->except(['create', 'edit']);
Route::get('post/all', [PostController::class, 'all']);
Route::get('post/slug/{post:slug}', [PostController::class, 'slug']);//Se indica por que atributo buscar ya que automaticament lo hace por la pk
Route::get('category/slug/{slug}', [CategoryController::class, 'slug']);
Route::get('category/{category}/posts', [CategoryController::class, 'posts']);
Route::post('post/upload/{post}', [PostController::class, 'upload']);

//Usuarios
Route::post('user/login', [UserController::class, 'login']);
