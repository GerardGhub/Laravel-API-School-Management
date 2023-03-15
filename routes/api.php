<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SclassController;
use App\Http\Controllers\Api\SubjectController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Student Class Route

Route::get('/class',[SclassController::class, 'Index']);
Route::post('/class/store',[SclassController::class, 'Store']);
Route::get('/class/edit/{id}',[SclassController::class, 'Edit']);
Route::post('/class/update/{id}',[SclassController::class, 'Update']);
Route::delete('/class/delete/{id}',[SclassController::class, 'Delete']);


//Subject Class Route

Route::get('/subject',[SubjectController::class, 'Index']);
Route::post('/subject/store',[SubjectController::class, 'Store']);
Route::get('/subject/edit/{id}',[SubjectController::class, 'Edit']);
Route::put('/subject/update/{id}',[SubjectController::class, 'Update']);
Route::delete('/subject/delete/{id}',[SubjectController::class, 'Delete']);