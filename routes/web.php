<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [userController::class, 'mainView']);
Route::post('save', [userController::class, 'store']);
Route::post('delete', [userController::class, 'destroy']);
Route::post('up_form', [userController::class, 'update_form']);
Route::post('up', [userController::class, 'modify']);
