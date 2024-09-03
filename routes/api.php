<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Se pone antes de definir resources por que si no busca un post con el parametro all
Route::get('post/all', [PostController::class, 'all']);

Route::get('category/all', [CategoryController::class, 'all']);

Route::resource('category', CategoryController::class)->except(['create', 'edit']);

Route::resource('post', PostController::class)->except(['create', 'edit']);
