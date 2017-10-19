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
/* Route::get('blog/{slug}',['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
->where('slug','[\w\d\-\_]+'); */
Route::get('blog/{slug}', 'BlogController@getSingle')->name('blog.single')->where('slug','[\w\d\-\_]+');
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
Route::get('contact', 'PagesController@getContact');
Route::post('contact','PagesController@postContact');
Route::get('/about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex')->name('home');

Route::resource('posts','PostController');

// Comments manually
Route::post('comments/{post_id}','CommentsController@store')->name('comments.store');
Route::get('comments/{id}/edit', 'CommentsController@edit')->name('comments.edit');
Route::put('comments/{id}','CommentsController@update')->name('comments.update');
Route::delete('comments/{id}', 'CommentsController@destroy')->name('comments.destroy');
Route::get('comments/{id}/delete','CommentsController@delete')->name('comments.delete');

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

// Categories
Route::resource('categories','CategoryController', ['except' => ['create']]);

// Tags
Route::resource('tags','TagController', ['except' => ['create']]);
