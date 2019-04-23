<?php

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
Route::get('/tutorials/tryit/{tryit_code}', 'TutorialController@tryit');
Route::resource("compiler", "CompilerController");
Route::resource("tutorials", "TutorialController");

Route::resource("/quiz", "QuizController");
Route::resource("users", "UsersController");
Route::resource("/user_tutorials", "UserTutorialsController");
