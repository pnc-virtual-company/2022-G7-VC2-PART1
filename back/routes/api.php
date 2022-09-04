<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


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

//====================== SignIn api =====================
Route::post('/login', [UserController::class,'signIn']);

// ===================== private route ===================
Route::group(['middleware'=>['auth:sanctum']],function(){

    //========================= Admin ====================
    Route::post('/admin',[AdminController::class,'store']);
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin/{id}',[AdminController::class,'show']);
    Route::put('/admin/{id}',[AdminController::class,'update']);
    Route::delete('/admin/{id}',[AdminController::class,'destroy']);
    
    //====================== student =======================
    Route::get("/students",[StudentController::class,'index']);
    Route::post("/students",[StudentController::class,'store']);
    Route::get("students/{id}",[StudentController::class,'show']);
    Route::put("students/{id}",[StudentController::class,'update']);
    Route::delete("students/{id}",[StudentController::class,'destroy']);

    //======================= Request ======================
    Route::post('/request',[RequestController::class , 'store']);
    Route::get('/request',[RequestController::class , 'index']);
    Route::get('/requests/{id}',[RequestController::class , 'show']);
    Route::put('/requests/{id}',[RequestController::class , 'update']);
    Route::delete('/requests/{id}',[RequestController::class , 'destroy']);
    Route::get('/getStudentLeave/{student_id}',[RequestController::class , 'getStudentLeave']);

    //====================== Class =========================
    Route::post('/class',[ClassesController::class ,'store']);
    Route::get('/class',[ClassesController::class ,'index']);

    //====================== Batch =========================
    Route::post('/batchs',[BatchController::class, 'store']);
    Route::get('/batches',[BatchController::class, 'index']);

    //====================== user signOut ==================
    Route::post('/signOut',[UserController::class,'signOut']);

    //====================== user Reset Password ============
    Route::patch('/adminResetPassword/{id}',[AdminController::class, 'adminResetPassword']);
    Route::patch('/studentResetPassword/{id}',[StudentController::class, 'StudentResetPassword']);
});
Route::post('/class',[ClassesController::class ,'store']);
Route::post('/batchs',[BatchController::class, 'store']);
Route::post('/request',[RequestController::class , 'store']);