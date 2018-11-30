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
Route::get('dash', 'UserController@getIndex')->name('user.dash');

Route::get('shortr', function () {
    return view('user.short-course-regestration');
});

Route::get('longr', function () {
    return view('user.long-course-regestration');
});

//Courses
Route::resource('courses', 'CourseController');


//Admin
Route::prefix('admin')->group( function () {
    Route::resource('/posts', 'PostController');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dash', 'AdminController@index')->name('dash');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::resource('/image-upload', 'ImageController')->except(['create']);
});