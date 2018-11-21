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

Route::resource('posts', 'PostController');

Route::get('blog', 'BlogController@getIndex')->name('blog');
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

Route::get('dash', 'DashController@index')->name('dash');

Route::get('/', function () {
    return view('main.index');
})->name('main');

Route::get('about', function () {
    return view('main.about');
})->name('about');

Route::get('contact-us', function () {
    return view('main.contact');
})->name('contact');

//Courses
Route::get('short-courses', function () {
    return view('courses.short');
})->name('short');
