<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::resource('category', CategoryController::class)->except(['create', 'edit']);
    Route::resource('post', PostController::class)->except(['create', 'edit']);
    
});
//Se pone antes de definir resources por que si no busca un post con el parametro all
Route::get('post/all', [PostController::class, 'all']);
Route::get('post/slug/{post:slug}', [PostController::class, 'slug']);//Se indica por que atributo buscar ya que automaticament lo hace por la pk
Route::get('category/all', [CategoryController::class, 'all']);
Route::get('category/slug/{slug}', [CategoryController::class, 'slug']);
Route::get('category/{category}/posts', [CategoryController::class, 'posts']);


