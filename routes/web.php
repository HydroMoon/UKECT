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


Route::get('/', 'BlogController@getMain')->name('main');
Route::get('about', 'BlogController@getEmployee')->name('about');
Route::get('short-courses', 'BlogController@getShort')->name('short');
Route::get('long-courses', 'BlogController@getLong')->name('long');

Route::get('media', 'BlogController@getMedia')->name('media');

Route::post('contact-us', 'BlogController@saveMessage')->name('contact.save');

Route::get('contact-us', function () {
    return view('main.contact');
})->name('contact');



//Users
Route::prefix('user')->group( function () {
    Route::get('/dash', 'UserController@getIndex')->name('user.dash');
    Route::get('/courses', 'UserController@getCourses')->name('user.courses');

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
    Route::post('/courses/short-courses', 'CourseController@storeShort')->name('admin.short.add');
    Route::post('/courses/long-courses', 'CourseController@storeLong')->name('admin.long.add');
    Route::delete('/courses-s/delete/{id}/', 'CourseController@destroyShort')->name('admin.scourse.delete');
    Route::delete('/courses-l/delete/{id}/', 'CourseController@destroyLong')->name('admin.lcourse.delete');
    Route::get('/courses-s/{id}/edit', 'CourseController@editShort')->name('admin.scourse.edit');
    Route::get('/courses-l/{id}/edit', 'CourseController@editLong')->name('admin.lcourse.edit');
    Route::put('/courses-s/{id}/edit', 'CourseController@updateShort')->name('admin.scourse.update');
    Route::put('/courses-l/{id}/edit', 'CourseController@updateLong')->name('admin.lcourse.update');

    Route::get('/messages', 'AdminController@getMessage')->name('admin.message');


    Route::resource('/image-upload', 'ImageController')->except(['create']);
    Route::get('/image-upload', 'ImageController@index')->name('admin.image');
    Route::get('/my-media', 'ImageController@media')->name('admin.media');
    Route::post('/image-upload', 'ImageController@store')->name('admin.image.add');
    Route::post('/media-upload', 'ImageController@storeMedia')->name('admin.image.add.media');
    Route::delete('/image-upload/delete/{id}', 'ImageController@destroy')->name('admin.image.delete');


    Route::get('/users', 'AdminController@getUsers')->name('users');
    Route::get('/users-short/{id}', 'AdminController@getShortUser')->name('users.single.short');
    Route::get('/users-long/{id}', 'AdminController@getLongUser')->name('users.single.long');
    Route::put('/users-short/{id}', 'AdminController@updateReg')->name('users.single.supdate');
    Route::put('/users-long/{id}', 'AdminController@updateRegs')->name('users.single.lupdate');

    Route::get('/add-user', 'AdminController@addUser')->name('users.add');

    Route::get('/add-long/{id}', 'AdminController@getLong')->name('users.inside.long');
    Route::get('/add-short/{id}', 'AdminController@getShort')->name('users.inside.short');

    Route::post('/add-long', 'AdminController@storeLong')->name('users.inside.long.submit');
    Route::post('/add-short', 'AdminController@storeShort')->name('users.inside.short.submit');

    Route::get('/teachers', 'AdminController@getTeacher')->name('admin.teacher');
    Route::post('/teachers', 'AdminController@storeTeacher')->name('admin.teacher.add');
});