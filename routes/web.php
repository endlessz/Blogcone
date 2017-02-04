<?php

Auth::routes();

/*
 *	Home
 */

Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'root'
]);

/*
 *	Post
 */

Route::resource('posts', 'PostController');

Route::post('/posts/{id}/like', [
	'uses' => 'PostController@postLike',
	'as' => 'posts.like'
]);

Route::post('/posts/{id}/review', [
	'uses' => 'PostController@postReview',
	'as' => 'posts.review'
]);

Route::post('/posts/{id}/cancel', [
	'uses' => 'PostController@postCancel',
	'as' => 'posts.cancel'
]);

/*
 *	Comment
 */

Route::post('/comments', [
	'uses' => 'CommentController@store',
	'as' => 'comments.store'
]);

/*
 *	Tag
 */

Route::get('/tags', [
	'uses' => 'TagController@index',
	'as' => 'tags.index'
]);

Route::get('/tags/{tag}', [
	'uses' => 'TagController@show',
	'as' => 'tags.show'
]);


Route::post('/tags', [
	'uses' => 'TagController@store',
	'as' => 'tags.store'
]);

Route::delete('/tags/{tag}', [
	'uses' => 'TagController@destroy',
	'as' => 'tags.destroy'
]);

/*
 *	Admin
 */

Route::get('/admin', 'AdminController@index');
Route::get('/admin/reviews', 'AdminController@review');