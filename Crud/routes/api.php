<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::get('/getAllUser', [UserController::class, 'users']);
Route::post('/createUser', [UserController::class, 'store']);

Route::delete('/deleteUser/{id}', [UserController::class, 'destroy']);
Route::put('/updateUser/{id}', [UserController::class, 'update']);

