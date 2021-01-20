<?php

use Illuminate\Support\Facades\Route;

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
/*-------end Frontend routes--------*/
Route::get('/',  [App\Http\Controllers\HomeController::class, 'index']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin/login', 'Admin\AdminController@index');
// Route::post('loginadmin', 'Admin\AdminController@login')->name('loginadmin');
Route::get('/courses', 'CourseController@index');
Route::get('/courses2', 'CourseController@index2');
Route::get('/learning', 'LearningController@index');
Route::get('/mycourses', 'CourseController@mycourses');
Route::get('courses/search', ['as' => 'courses.search', 'uses' => 'CourseController@search']);
Route::get('/coursepreview/{id}', 'TestController@coursepreview');
Route::get('/exam/{examid}/take', 'TestController@exam');
Route::post('/exam/save', 'TestController@saveExam');
Route::get('category/{id}', 'CoursecategoryController@coursesByCategory');
Route::post('/load-more-courses','CoursecategoryController@coursesByCategoryAjax');

Route::post('/lecture', 'TestController@lecture');
Route::post('/lecture/status', 'TestController@lectureStatus');

/*-------end Frontend routes--------*/
/*--------User Routes---------*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('user/profile','ProfileController@index');
    Route::post('/update/profile','ProfileController@profileUpdate');
    Route::post('/update/password','ProfileController@passwordUpdate');
    Route::get('/courses/payments', 'CourseController@payments');
    Route::post('/course/enroll', 'CourseController@enroll');
    
    Route::get('/stripe/view', 'CourseController@stripeview');
    Route::post('/stripe/enroll', 'CourseController@stripe');
    Route::get('/payment/view', 'TestController@stripeview');
    Route::post('/payment/buy', 'TestController@stripe');

    Route::post('/course/certificate', 'CourseController@certificate');
    Route::get('/course/viewcertificate/{id}', 'CourseController@viewcertificate');
    Route::get('/course/genratecertificate/{id}', 'CourseController@genratecertificate');

});
 Route::get('course/{id}', 'CourseController@show');
Route::get('/append', 'AdminController@sections');
Route::group(['middleware' => ['auth','authorized']], function () {
    Route::resource('pages','PageController');
    Route::post('/admin/profile/update','AdminController@profileUpdate');
    Route::post('/admin/update/password','AdminController@passwordUpdate');
	    //Route::resource('exam','ExamController');

        Route::post('/admin/exam/create','ExamController@create');
        Route::post('/admin/exam/update','ExamController@update');
        Route::get('/exam/sections', 'ExamController@sections');
        Route::post('/exam/publish', 'ExamController@publish');
        Route::post('/exam/updatequestions', 'ExamController@updatequestions');
        Route::post('/exam/deletequestion', 'ExamController@deletequestion');
	    Route::get('/admin/exam/{id}','ExamController@show');
		Route::get('/admin/instructors','InstructorController@index');
		Route::post('/admin/instructor/insert','InstructorController@store');
		Route::post('/admin/instructor/dataview','InstructorController@dataview');
        Route::post('/admin/instructor/intructorupdate', 'InstructorController@intructorupdate');
        Route::post('/admin/instructor/delete', 'InstructorController@delete');


    Route::get('overview', 'OverviewController@index');
    Route::get('admin/profile','AdminController@profile');
    //---courses--
    Route::resource('course', 'AdminController');
    Route::post('/course/destroy', 'AdminController@destroy');
    Route::get('admincourseshow/{$id}', 'AdminController@display');
    Route::post('/updatecontent', 'AdminController@updatecontent');
    Route::get('admin/course/show/{id}', ['as' => 'admincourse.show', 'uses' => 'AdminController@show']);
    // Route::get('admin/course', 'AdminController@index');
    // Route::post('admin/course/store', 'AdminController@store');
    Route::post('admin/course/edit', 'AdminController@edit');
    Route::post('admin/course/update', 'AdminController@update');
    Route::get('course/curriculum/{id}','AdminController@courseCurriculum');
    Route::post('course/curriculumCreate','AdminController@courseCurriculumcreate');
    Route::post('course/curriculumStore','AdminController@courseCurriculumstore');
    Route::get('course/chapter/delete/{id}', 'AdminController@courseChapterdelete');
    Route::post('/course/delete/content', 'AdminController@courseDeletecontent');
    //---courses-category---
    Route::resource('/coursecategory', 'CoursecategoryController');
    Route::post('/coursecategory/updateview', 'CoursecategoryController@updateview');
    Route::post('/coursecategory/store', 'CoursecategoryController@store');
    Route::post('/coursecategory/update', 'CoursecategoryController@update');
    Route::post('/coursecategory/delete', 'CoursecategoryController@delete');

    Route::get('/admin/course/payments', 'AdminController@payments');
    Route::get('/admin/seo', 'SeoController@index');
    Route::post('/admin/seo/store', 'SeoController@store');
    Route::post('/admin/seo/edit', 'SeoController@edit');
    Route::post('/admin/seo/update', 'SeoController@update');
    Route::Post('/admin/seo/delete', 'SeoController@delete');
});
	