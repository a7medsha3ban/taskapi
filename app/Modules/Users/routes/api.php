<?php


use Illuminate\Support\Facades\Route;
use Users\Http\Controllers\AuthController;
use Users\Http\Controllers\BookController;
use Users\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->prefix('api')->group(function (){

        //All secure URL's

    //books
    Route::get('books',[BookController::class,'list']);
    Route::post('addBook',[BookController::class,'store']);
    Route::post('updateBook',[BookController::class,'update']);
    Route::post('destroyBook',[BookController::class,'destroy']);
    Route::get('searchBook/{name}',[BookController::class,'search']);

    Route::post("logout",[AuthController::class,'logout']);
});



Route::post("login",[AuthController::class,'login']);



