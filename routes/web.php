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

Route::get('/dump', 'UserController@edit');

Route::get('/profile/{id}', 'ProfileController@index');
Route::get('/post/{id}', 'PostController@ShowPost');


Auth::routes();

Route::get('/test', function(){
	return View('ImageProccessing');
});

Route::post('/AddComment/{id}', 'CommentController@create');

Route::post('/AddPost', 'PostController@create');

Route::get('/test/{id}', 'PostController@ShowPosts');

Route::post('/profile/edit', 'ProfileController@UpdateProfile');

Route::post('/profile/edit/{id}', 'ProfileController@UpdatePicture');

Route::post('/AddItem', 'PostController@AddPost');

Route::get('/home', 'HomeController@index')->name('home');
