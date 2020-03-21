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

// Route::get("form", "HomeController@myform");
// Route::post("index", "HomeController@index");
// Route::post("index", "HomeController@view");

Route::resource('student', 'StudentController');


// this is for admin route
Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {
    Route::get('admindashboard', 'AdminController@index')->name('admindashboard');
});


// this is for user route
Route::group(['as'=>'user.','prefix' => 'user','namespace'=>'User','middleware'=>['auth','user']], function ()
 	{
    Route::get('userdashboard','UserController@index')->name('userdashboard');
	});
