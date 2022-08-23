<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\AdminController;

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
// public route
Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});
Route::post('/login', [StudentController::class,'signIn']);
Route::get('/login', [StudentController::class,'signIn']);


// private route
Route::apiResource('request',RequestController::class);

Route::get("/students",[StudentController::class,'index']);
Route::post("students",[StudentController::class,'store']);

Route::group(['middleware'=>['auth:santucm']],function(){
    Route::delete("students/{id}",[StudentController::class,'destroy']);
    Route::put("students/{id",[StudentController::class,'update']);
});
Route::apiResource('class',ClassesController::class);
Route::apiResource('batchs',BatchController::class);
Route::apiResource('admin',AdminController::class);