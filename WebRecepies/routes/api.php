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

Route::resource('recepie','App\Http\Controllers\RecepieController');
Route::resource('freefrom','App\Http\Controllers\FreeFromController');
Route::resource('welcome','App\Http\Controllers\Controller');
Route::resource('forum', 'App\Http\Controllers\ForumController');
Route::resource('signout', 'App\Http\Controllers\Auth\AuthenticatedSessionController');
Route::post('/recepie/success', 'App\Http\Controllers\RecepieController@storeWithDeatils')->name('success');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
