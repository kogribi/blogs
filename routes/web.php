<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/create', [BlogController::class, 'create']);
Route::get('/blog/{blog}', [BlogController::class, 'show']);
Route::post('/blog', [BlogController::class, 'store']);
Route::get('/blog/{blog}/edit', [BlogController::class, 'edit']);
Route::put('/blog/{blog}', [BlogController::class, 'update']);
Route::delete('/blog/{blog}', [BlogController::class, 'destroy']);



Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);
Route::put('/categories/{category}', [CategoryController::class, 'update']);
Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

Route::post('/comment', [CommentController::class, 'store']);
Route::delete('/comment/{comment}', [CommentController::class, 'destroy']);