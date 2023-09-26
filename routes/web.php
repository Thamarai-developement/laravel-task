<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;


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

Route::get('/', function(){
    return view('home');
});

Route::group(['prefix' => 'user', 'as' => 'user.'], function (){

    Route::get('/list', [UserController::class,'index']);
    Route::get('/create', [UserController::class,'create']);
    Route::post('/store', [UserController::class,'store']);
    Route::get('/show/{id}', [UserController::class,'show']);
    Route::get('/edit/{id}', [UserController::class,'edit']);
    Route::put('/update', [UserController::class,'update']);
    Route::delete('/delete/{id}',[UserController::class,'destroy']);
});

Route::group(['prefix' => 'contact', 'as' => 'contact.'], function (){

    Route::get('/list', [ContactController::class,'index']);
    Route::get('/create', [ContactController::class,'create']);
    Route::post('/store', [ContactController::class,'store']);
    Route::get('/show/{id}', [ContactController::class,'show']);
    Route::get('/edit/{id}', [ContactController::class,'edit']);
    Route::put('/update', [ContactController::class,'update']);
    Route::delete('/delete/{id}',[ContactController::class,'destroy']);
});







