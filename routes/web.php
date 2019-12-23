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


Route::get('/user/{account}/works/{workID}', 'WorkController@index');

Auth::routes();

Route::get('/logOut', function(){
	if(Auth::check()) {
		Auth::logout();
	}
    return redirect('/pigether');
});

Route::get('/home', 'HomeController@index');

Route::get('/user/{account}', 'UserController@index');

Route::post('/review', 'CommentController@add');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/{account}/editInfo', 'EditInfoController@index')->name('editInfo');
    Route::post('/user/{account}/editInfo', 'EditInfoController@index')->name('editInfo');
    Route::post('/updateInfo', 'EditInfoController@update')->name('updateInfo'); //更新個資表單用
    Route::post('/newWork', 'EditInfoController@newWork')->name('newWork'); //新增作品用

    Route::get('/user/{account}/editWorks/{workID}', 'EditWorksController@index')->name('editWorks');
    Route::post('/updateWork', 'EditWorksController@update')->name('updateWork'); //更新作品表單用
    Route::get('/deleteWork', 'EditWorksController@deleteImage')->name('deleteWork'); //刪除照片
});

