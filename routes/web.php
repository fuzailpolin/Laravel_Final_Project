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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'loginController@index')->name('login');
Route::post('/login', 'loginController@verify');
Route::get('/logout', 'LogoutController@index');

Route::group(['middleware'=>['sess']], function(){
	
	Route::group(['middleware'=>['admin']], function(){
		Route::get('/registration', 'registrationController@index')->name('reg.index');
		Route::post('/registration', 'registrationController@store');
		
		Route::get('/admin/viewUser/{job}', 'adminController@view')->name('admin.viewUser');
		Route::post('/admin/viewUser/{job}', 'adminController@action');

		Route::get('/admin/viewCourses', 'CoursesController@index')->name('admin.viewCourse');
		Route::post('/admin/viewCourses', 'CoursesController@search');

		Route::get('/user/notice', 'NoticeModelController@send')->name('notice.send');
		Route::post('/user/notice', 'NoticeModelController@store');

		Route::get('/admin/addCourse', 'CoursesController@addCourse')->name('course.add');
		Route::post('/admin/addCourse', 'CoursesController@store');

		Route::get('/admin/assignTeacher/{id}', 'CoursesController@assignTeacher')->name('course.teacher');
		Route::post('/admin/assignTeacher/{id}', 'CoursesController@storeTeacher');

		Route::get('/admin/editCourse/{id}', 'CoursesController@edit')->name('course.edit');
		Route::post('/admin/editCourse/{id}', 'CoursesController@update');
		
		Route::get('/admin/deleteCourse/{id}', 'CoursesController@destroy')->name('course.delete');
		Route::get('/admin/deleteUser/{id}', 'userController@destroy')->name('user.delete');
	});

	
	
	//teacher
	
	Route::group(['middleware'=>['teacher']], function(){
		Route::get('/teacherHome', 'teacherController@index')->name('teacher.index');
		Route::get('/teacher/section', 'StdCoursesModelController@index')->name('section.view');
		Route::post('/teacher/section', 'StdCoursesModelController@sectionSearch');
		Route::get('/teacher/section/viewStudent/{course}', 'StdCoursesModelController@showStudent')->name('student.view');
		Route::post('/teacher/section/viewStudent/{course}', 'StdCoursesModelController@studentCourseUpdate');
		Route::get('/teacher/sendNotice/{section}', 'NoticeModelController@sectionSend')->name('section.send');
		Route::post('/teacher/sendNotice/{section}', 'NoticeModelController@sectionStore');
	});
	
	
	//student
	Route::get('/student/courseView', 'StdCoursesModelController@stdCourse')->name('stdCourse.view');
	Route::get('/student/courseRegister', 'StdCoursesModelController@registerCourse')->name('stdCourse.register');
	Route::get('/student/addCourse/{course}', 'StdCoursesModelController@addCourse')->name('stdCourse.add');
	Route::get('/student/dropCourse/{course}', 'StdCoursesModelController@dropCourse')->name('course.drop');
	
	
	//all member
	Route::get('/home', 'userController@index')->name('home.index');
	
	Route::get('/user/mail', 'NoticeModelController@mailIndex')->name('mail.send');
	Route::post('/user/mail', 'NoticeModelController@sendMail');
	
	Route::get('/user/profile', 'userController@profile')->name('user.profile');
		//Route::post('/adminhome/profile', 'adminController@profile');
	Route::get('/profile/{id}', 'userController@edit')->name('user.edit');
	Route::post('/profile/{id}', 'userController@update');
	
	Route::get('/uploadPhoto', 'userController@imgUpload')->name('image.upload');
	Route::post('/uploadPhoto', 'userController@imgStore');
		
		
	Route::get('/user/viewNotice', 'NoticeModelController@show')->name('notice.show');
	Route::get('/user/uploadPhoto','ImageModelController@index')->name('user.image');
	
	
	
});