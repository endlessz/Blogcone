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

Auth::routes();

/*
 *	Home
 */

Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'root',
]);

/*
 *	Post
 */

Route::resource('posts', 'PostController');

/*
 *	Comment
 */

Route::post('/comments', [
	'uses' => 'CommentController@store',
	'as' => 'comments.store',
]);

/*
 *	Tag
 */

Route::get('/tags', [
	'uses' => 'TagController@index',
	'as' => 'tags.index',
]);

Route::get('/tags/{tag}', [
	'uses' => 'TagController@show',
	'as' => 'tags.show',
]);


Route::post('/tags', [
	'uses' => 'TagController@store',
	'as' => 'tags.store',
]);

Route::delete('/tags/{tag}', [
	'uses' => 'TagController@destroy',
	'as' => 'tags.destroy',
]);

/*
 *	Admin
 */

Route::get('/admin', 'AdminController@index');