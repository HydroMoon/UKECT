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


Route::get('blog', 'BlogController@getIndex')->name('blog');
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

//Route::get('dash', 'DashController@index')->name('dash');

Route::get('/', function () {
    return view('main.index');
})->name('main');

Route::get('about', function () {
    return view('main.about');
})->name('about');

Route::get('contact-us', function () {
    return view('main.contact');
})->name('contact');

Route::get('short-courses', function () {
    return view('courses.short');
})->name('short');

Route::get('long-courses', function () {
    return view('courses.long');
})->name('long');

//Users
Route::prefix('user')->group( function () {
    Route::get('/dash', 'UserController@getIndex')->name('user.dash');

    Route::get('/short-reg', 'UserController@getShort')->name('user.short');
    Route::post('/short-reg', 'UserController@storeShort')->name('user.short.submit');

    Route::get('/long-reg', 'UserController@getLong')->name('user.long');
    Route::post('/long-reg', 'UserController@storeLong')->name('user.long.submit');
});

    





//Admin
Route::prefix('admin')->group( function () {
    Route::resource('/posts', 'PostController');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dash', 'AdminController@index')->name('dash');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


    Route::get('/courses', 'CourseController@getIndex')->name('admin.courses');
    Route::get('/courses/short-courses', 'CourseController@createShort')->name('admin.short');
    Route::get('/courses/long-courses', 'CourseController@createLong')->name('admin.long');
    Route::post('/courses/short-courses', 'CourseController@createShort')->name('admin.short.add');
    Route::post('/courses/long-courses', 'CourseController@createLong')->name('admin.long.add');


    Route::resource('/image-upload', 'ImageController')->except(['create']);


    Route::get('/users', 'AdminController@getUsers')->name('users');
    Route::get('/users-short/{id}', 'AdminController@getShortUser')->name('users.single.short');
    Route::get('/users-long/{id}', 'AdminController@getLongUser')->name('users.single.long');

    
});