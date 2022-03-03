<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function(){
    Route::apiResource('album',\App\Http\Controllers\AlbumController::class);      
    Route::get('image',[\App\Http\Controllers\photo_manipulationController::class,'index']);
    Route::get('image/by-album/{album}',[\APP\Http\Controllers\photo_manipulationController::class,'ByAlbum']);
    Route::get('image/{image}',[\App\Http\Controllers\photo_manipulationController::class,'show']);
    Route::post('image/resize',[\App\Http\Controllers\photo_manipulationController::class,'resize']);
    Route::delete('image/{image}',[\App\Http\Controllers\photo_manipulationController::class,'destroy'])   ;
});
