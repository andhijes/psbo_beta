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

//Route::get('/', function () {
    //return view('welcome');
//});

<<<<<<< HEAD
Route::get('/', 'UserController@readScholarship');

Route::get('/home', 'UserController@readScholarship');

Route::get('/editProfile', 'UserController@viewProfile')->name('user.viewProfile');

Route::patch('/editProfile', 'UserController@updateProfile')->name('user.updateProfile');

Route::get('/description/{id}', 'UserController@viewDescription')->name('description.viewDescription');
=======
Route::get('/', function () {
    return view('index');
});
>>>>>>> 2ce37fad0abe069acaf84e8499d402b03c9b0971

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

<<<<<<< HEAD
Route::get('matchme', function () {
    return view('matchme');
});

Auth::routes();

=======
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

>>>>>>> 2ce37fad0abe069acaf84e8499d402b03c9b0971
Route::prefix('admin')->group(function(){
    Route::get('/profile', 'AdminController@profile')->name('admin.profile');
    Route::patch('/profile', 'AdminController@update')->name('admin.update'); 
    Route::post('/profile', 'AdminController@changePassword')->name('admin.password'); 
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/addScholarship', 'ScholarshipController@create')->name('addScholarship.create');
    Route::post('/addScholarship', 'ScholarshipController@store')->name('addScholarship.store');
    Route::get('/student', 'StudentController@read')->name('student');
    Route::get('/scholarship', 'ScholarshipController@read')->name('scholarship.read');
    Route::get('/scholarshipView/{id}', 'ScholarshipController@view')->name('scholarship.view');
    Route::get('/editScholarship/{id}/edit', 'ScholarshipController@edit')->name('editScholarship.edit');
    Route::patch('/editScholarship/{id}/edit', 'ScholarshipController@update')->name('editScholarship.update');
    Route::delete('/editScholarship/{id}/delete', 'ScholarshipController@destroy')->name('editScholarship.destroy');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    // Route::post('/test', 'adminController@updatePhoto')->name('admin.updatePhoto');
    Route::get('/test', 'TagController@test')->name('admin.test');
    Route::get('/testview/{id}', 'TagController@testview')->name('admin.testview');
    Route::resource('tags', 'TagController', ['except'  => ['create']]);
});
