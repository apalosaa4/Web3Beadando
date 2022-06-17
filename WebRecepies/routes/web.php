<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RecepieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;

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

Route::get('/profile', 'ProfileController@show')->name('profile');
Route::get('/signout', '\App\Http\Controllers\Auth\AuthenticatedSessionController@signout')->name('signout');

Route::get('/recepie', 'RecepieController@index')->name('recepie');
Route::get('/recepie/{id}', 'RecepieController@show')->name('recepieid');
Route::post('/recepie/add', 'RecepieController@create')->name('addrecipe');

Route::get('/', 'HomeController@index')->name('welcome');
Route::get('/welcome', 'HomeController@index')->name('welcome');
//Route::get('/welcome', function () {return view('welcome'); }) ->middleware(['auth'])->name('welcome');

Route::get('/forum', 'ForumController@index')->name('forum');

Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
