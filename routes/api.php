<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\controllers\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public route....

// User
Route::post('/register',[UserController::class, 'register']);
Route::post('/login',[UserController::class, 'login']);
// Post
Route::get('/posts',[PostController::class, 'index']);
Route::get('/posts/{id}',[PostController::class, 'show']);


// Private route.....
Route::group(["middleware"=>["auth:sanctum"]], function (){
    
    // User
    Route::post('/logout',[UserController::class, 'logout']);

    // Post
    Route::post('/posts',[PostController::class, 'store']);
    Route::put("posts/{id}",[PostController::class,"update"]);
    Route::delete('/posts/{id}',[PostController::class, 'destroy']);
 
});
