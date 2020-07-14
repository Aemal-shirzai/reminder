<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// routes
Route::get("/main",function() {
    return view("layouts.main");
});
Route::GET("profile/edit","ProfileController@edit")->name("profile.edit");
Route::GET("colleagues","ColleaguesController@createList")->name("colleagues.createList");
Route::GET("colleagues/{id}/edit","ColleaguesController@edit")->name("colleagues.edit");
Route::GET("events","EventController@createList")->name("events.createList");
Route::GET("events/{id}/edit","EventController@edit")->name("events.edit");