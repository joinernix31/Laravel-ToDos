<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TodoController as TodoV1;
use App\Http\Controllers\Api\V1\CategoryController as CategoryV1;
use App\Http\Controllers\Api\V2\TodoController as TodoV2;
use App\Http\Controllers\Api\V2\CategoryController as CategoryV2;
use App\Http\Controllers\Api\LoginController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//API V1
Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('v1/todos', Todov1::class)
        ->only(['index','show','destroy']);
    Route::apiResource('v1/categories',CategoryV1::class)
        ->only(['index','show','destroy']);
});
//API V2
Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('v2/todos', TodoV2::class)
        ->only('index', 'show', 'destroy');
Route::apiResource('v2/categories', CategoryV2::class)
    ->only('index', 'show', 'destroy');
});

Route::post('/login', [LoginController::class, 'Login']);


