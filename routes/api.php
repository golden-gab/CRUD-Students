<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('students',[studentsController::class,'showStudents']);
Route::get('students/{id}',[studentsController::class,'showStudent']);
Route::post('students',[studentsController::class,'createStudent']);
Route::put('students/{id}',[studentsController::class,'updateStudent']);
Route::delete('students/{id}',[studentsController::class,'deleteStudent']);