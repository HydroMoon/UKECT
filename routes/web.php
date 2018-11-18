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

Route::resource('posts', 'PostController');

Auth::routes();

Route::get('blog', 'BlogController@getIndex')->name('blog');
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

Route::get('dash', 'DashController@index')->name('dash');

// Route::get('/dash', function () {
//     return view('dashboard.index');
// });
