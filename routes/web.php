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
    return view('layouts.main');
})->name("main")->middleware("auth");

Auth::routes(["register"=>false]);

Route::get('/home', 'HomeController@index')->name('home');


// routes
// Route::get("/main",function() {
//     return view("layouts.main");
// });

Route::GET("profile/edit","ProfileController@edit")->name("profile.edit");
Route::PUT("profile/update","ProfileController@update")->name("profile.update");
Route::PUT("profile/update/password","ProfileController@updatePassword")->name("profile.update.password");

Route::GET("colleagues","ColleaguesController@createList")->name("colleagues.createList");
Route::GET("colleagues/{id}/edit","ColleaguesController@edit")->name("colleagues.edit");
Route::POST("colleagues/store","ColleaguesController@store")->name("colleagues.store");
Route::PUT("colleagues/{id}/update","ColleaguesController@update")->name("colleagues.update");
Route::PUT("colleagues/changeStatus","ColleaguesController@changeStatus")->name("colleagues.changeStatus");
Route::DELETE("colleagues/delete","ColleaguesController@delete")->name("colleagues.delete");

Route::GET("events","EventController@createList")->name("events.createList");
Route::GET("events/{id}/edit","EventController@edit")->name("events.edit");