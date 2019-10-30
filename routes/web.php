<?php

use App\department;

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

Route::get('/search', function() {
    return view('search', ["departments" => Department::All()]);
});
Auth::routes();
Route::get('/signUp', function() {
    return view('signUp');
});

Route::get('/signIn', function() {
    return view('signIn');
});
Route::get('/home', 'HomeController@index');