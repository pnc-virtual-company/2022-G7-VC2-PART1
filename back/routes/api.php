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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("students",StudentController::class);
Route::apiResource('request',RequestController::class);
Route::apiResource('class',ClassesController::class);
Route::apiResource('batchs',BatchController::class);
Route::apiResource('admin',AdminController::class);

Route::post('signIn', [StudentController::class,'signIn']);