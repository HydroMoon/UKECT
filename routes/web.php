<?php

use Illuminate\Support\Facades\Input;
use App\User;

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

Route::get('lang/{lang}', ['as' => 'lang', 'uses' => 'LanguageController@switchLang']);


Route::get('blog', 'BlogController@getIndex')->name('blog');
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');


Route::get('/', 'BlogController@getMain')->name('main');
Route::get('about', 'BlogController@getEmployee')->name('about');
Route::get('short-courses', 'BlogController@getShort')->name('short');
Route::get('long-courses', 'BlogController@getLong')->name('long');

Route::get('media', 'BlogController@getMedia')->name('media');

Route::get('all', 'BlogController@all')->name('all_courses');

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

    Route::get('/note/{cid}', 'UserController@note')->name('user.notes');

    Route::get('/cert-course/{id}', 'UserController@Cert')->name('show_cert');
    Route::get('/cert-program/{id}', 'UserController@Certl')->name('show_certl');

    Route::get('/program/{id}', 'UserController@getSubject')->name('user.subject');
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

    Route::post('/users-certs', 'AdminController@addCerts')->name('users.single.addcerts');
    Route::post('/users-certl', 'AdminController@addCertl')->name('users.single.addcertl');

    Route::get('/add-user', 'AdminController@addUser')->name('users.add');

    Route::delete('/del-user/{id}', 'AdminController@delUser')->name('users.del');

    Route::get('/add-long/{id}', 'AdminController@getLong')->name('users.inside.long');
    Route::get('/add-short/{id}', 'AdminController@getShort')->name('users.inside.short');

    Route::post('/add-long', 'AdminController@storeLong')->name('users.inside.long.submit');
    Route::post('/add-short', 'AdminController@storeShort')->name('users.inside.short.submit');

    Route::get('/teachers', 'AdminController@getTeacher')->name('admin.teacher');
    Route::post('/teachers', 'AdminController@storeTeacher')->name('admin.teacher.add');
    Route::delete('/teachers/{id}', 'AdminController@deleteTeacher')->name('admin.teacher.delete');

    Route::get('/add-note/{id}/{cid}', 'AdminController@addNote')->name('admin.note');
    Route::post('/add-note', 'AdminController@storeNote')->name('admin.note.store');

    Route::get('/program/{id}', 'AdminController@getSubject')->name('admin.subject.get');
    Route::put('/program/{id}', 'AdminController@addSubject')->name('admin.subject.add');

    Route::post('/users/search', function () {
        $q = Input::get ( 'q' );
        $user = User::where('name', 'LIKE', '%' . $q . '%')->orWhere('phone', 'LIKE', '%' . $q . '%')->get();
        if(count($user) > 0) {
            return view('dashboard.users')->with(['data' => $user])->withQuery($q);
        } else {
            Session::flash('error', __('trans.search'));
            return redirect()->route('users');
        }
    })->name('search.users');
});