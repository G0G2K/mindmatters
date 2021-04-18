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

use \App\Post;

Route::get('/', function () {

	$posts = Post::all();

    return view('home', [
    	'title' => 'Home',
    	'posts' => $posts,
    ]);
});

Auth::routes();

Route::get('/profile/{user}', 'ProfileController@show')->name('profile');

Route::get('/profile/edit/user/{user}', 'ProfileController@edituser')->name('edit_user');

Route::post('/profile/edit/user/{user}/patch', 'ProfileController@patchUser')->name('patch_user');

Route::get('/profile/edit/{user}', 'ProfileController@edit')->name('edit_profile');

Route::post('/profile/edit/{user}/patch', 'ProfileController@patchProfile')->name('patch_profile');

Route::get('/posts/create', 'PostController@create')->name('create_post');

Route::get('/posts/edit/{post}', 'PostController@edit')->name('edit_post');

Route::post('/posts/edit/{post}/patch', 'PostController@patch')->name('patch_post');

Route::post('/posts/store', 'PostController@store')->name('store_post');

Route::get('/posts/show/{post}', 'PostController@show')->name('show_post');

Route::get('/about', function(){
	return view('about', [
		'title' => 'About Us',
	]);
})->name('about');

Route::get('/contact', function(){
	return view('contact', [
		'title' => 'Contact Us',
	]);
})->name('contact');

