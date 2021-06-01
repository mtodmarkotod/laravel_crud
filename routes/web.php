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

Route::resource('posts', 'PostsController')->middleware('auth', ['except' => 'create']);

// Route::get('/posts', 'PostsController@index');

// Route::get('posts/create', 'PostsController@create')->middleware('auth');

// Route::post('/posts', 'PostsController@store')->name('posts.store');

// Route::get('posts/{post}', 'PostsController@show');

// Route::get('posts/{post}/edit', 'PostsController@edit');

// Route::put('posts/{post}', 'PostsController@update');

// Route::delete('posts/{post}', 'PostsController@destroy');

// Route::post('/posts/{post}/add-Comment', 'PostsController@addComment');

// Route::delete('posts/delete-comment/{comment}', 'PostsController@deleteComment');

Route::get('/contact-us', 'ContactUsController@create');

Route::post('/contact-us', 'ContactUsController@store');



