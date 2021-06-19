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
// Route::get('about', 'BlogController@getEmployee')->name('about');
Route::get('short-courses', 'BlogController@getShort')->name('short');
Route::get('long-courses', 'BlogController@getLong')->name('long');


Route::get('all', 'BlogController@all')->name('all_courses');

Route::post('contact-us', 'BlogController@saveMessage')->name('contact.save');

Route::get('contact-us', function () {
    return view('main.contact');
})->name('contact');

Route::get('course-material', function () {
    return view('user.course-material');
})->name('course-material');



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


    Route::get('/courses/{id}', 'UserController@getSubject')->name('user.courses.show');
    Route::get('/material/{c_id}', 'UserController@getStudentCourse')->name('user.materials');

    //Quizzes
    Route::get('/quizzes/{id}', 'UserController@getQuizzes')->name('user.quiz.show');
    Route::get('/quiz/{id}', 'UserController@getQuestions')->name('user.question.show');
    Route::post('/quiz-answer-add', 'UserController@addAnswers')->name('user.answer.add');

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
    Route::post('/teachers', 'AdminController@createTeacher')->name('admin.teacher.add');
    Route::delete('/teachers/{id}', 'AdminController@deleteTeacher')->name('admin.teacher.delete');

    Route::get('/add-note/{id}/{cid}', 'AdminController@addNote')->name('admin.note');
    Route::post('/add-note', 'AdminController@storeNote')->name('admin.note.store');

    Route::get('/program/{id}', 'AdminController@getSubject')->name('admin.subject.get');
    Route::post('/program/{id}', 'AdminController@addSubject')->name('admin.subject.add');


    Route::get('/my-courses', 'AdminController@getMyCourses')->name('admin.courses.get');
    Route::get('/add-lectures/{c_id}', 'AdminController@getLectures')->name('admin.lectures.get');
    Route::post('/upload-lectures', 'AdminController@addMaterials')->name('admin.upload.lectures');
    Route::delete('del-material/{id}', 'AdminController@delMaterial')->name('admin.material.delete');
    
    Route::post('/upload', 'FileUploadController@store')->name('admin.upload.file');


    //Quizzes
    Route::get('/course-quiz/{c_id}', 'CourseController@getQuizzes')->name('admin.quiz.get');
    Route::post('/course-quiz-add', 'CourseController@addQuizzes')->name('admin.quiz.add');
    Route::delete('del-quiz/{id}', 'CourseController@delQuiz')->name('admin.quiz.delete');

    //Quiz Questions
    Route::get('/course-question/{q_id}', 'CourseController@getQuestions')->name('admin.question.get');
    Route::post('/course-question-add', 'CourseController@addQuestions')->name('admin.question.add');
    Route::delete('del-question/{id}', 'CourseController@delQuestion')->name('admin.question.delete');

    //Answers
    Route::get('/course-answers/{q_id}', 'CourseController@getAnswers')->name('admin.answer.get');
    Route::post('/course-answer-add', 'CourseController@addAnswers')->name('admin.answer.add');
    Route::delete('del-answer/{id}', 'CourseController@delAnswer')->name('admin.answer.delete');

    //Users marka
    Route::get('/users-marks/{c_id}', 'CourseController@getMarks')->name('admin.mark.get');
    Route::get('/quiz-marks/{q_id}', 'CourseController@getQuizMark')->name('admin.quizmark.get');

    Route::post('/users/search', function () {
        $q = Input::get('q');
        $user = User::where('name', 'LIKE', '%' . $q . '%')->orWhere('phone', 'LIKE', '%' . $q . '%')->get();
        if(count($user) > 0) {
            return view('dashboard.users')->with(['data' => $user])->withQuery($q);
        } else {
            Session::flash('error', __('trans.search'));
            return redirect()->route('users');
        }
    })->name('search.users');
});