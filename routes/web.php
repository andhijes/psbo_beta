<?php

use App\Notifications\TutorialPublished;
use Illuminate\Support\Collection;
use App\Userinfo;
use App\scholarship;
session()->regenerate();
error_reporting(0);

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

Route::get('/', 'UserController@readScholarship');

Route::get('/home', 'UserController@readScholarship');

Route::get('/editProfile', 'UserController@viewProfile')->name('user.viewProfile');

Route::patch('/editProfile', 'UserController@updateProfile')->name('user.updateProfile');

Route::get('/description/{id}', 'UserController@viewDescription')->name('description.viewDescription');

//emaul all user with conditions
//ini buat user yang baru ngisi ipk dll, tempel di tombol update profile user
Route::get('/video', function() {
$requirement = App\requirement::latest()->first();
$mytime = Carbon\Carbon::now();
$mytime = Carbon\Carbon::parse($mytime);
$mytime = $mytime->toDateString();

$user = App\Userinfo::latest()->first();
$a = strpos($requirement->getAttribute('program'), $user->getAttribute('program'));
dd($a);

// foreach (App\requirement::all() as $requirement) {
//   $deadline = $requirement->getAttribute('deadline');
//   if(Carbon\Carbon::parse($deadline)->gt($mytime)) {
//       echo $requirement->getAttribute('id');
//   }
// }
// foreach (App\Userinfo::all() as $user) {
//   if($user->getAttribute('faculty') == $requirement->getAttribute('faculty') and
//   $user->getAttribute('gda') >= $requirement->getAttribute('gda') and
//   $user->getAttribute('semester') == $requirement->getAttribute('semester') and
//   $user->getAttribute('program') == $requirement->getAttribute('program')) {
//     $user->notify(new TutorialPublished($user));
//   }
// }
});

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::get('matchme', function () {
    $mytime = Carbon\Carbon::now();
    $mytime = Carbon\Carbon::parse($mytime);
    $mytime = $mytime->toDateString();
    $nama2 = '';

    foreach (App\requirement::all() as $requirement) {
      $terakhir = App\requirement::latest()->first();
      $scholarships   = scholarship::find($requirement->getAttribute('id'));
      $requirements   = $scholarships->name;
      $deadline = $requirement->getAttribute('deadline');
      $a = strpos($requirement->getAttribute('program'), Auth::User()->program);
      $fakultas = strpos($requirement->getAttribute('program'), Auth::User()->faculty);
      $semester = strpos($requirement->getAttribute('program'), Auth::User()->program);
      if(Carbon\Carbon::parse($deadline)->gt($mytime) and Auth::User()->gda >= $requirement->getAttribute('gda')
        and ($fakultas>=0 or $requirement->getAttribute('faculty') == 'Semua Fakultas') and $semester>=0 and $a>=0) {
          //echo $requirement->getAttribute('id');
          $nama2 = $nama2 . $requirements;
          if($requirement->getAttribute('id') != $terakhir->getAttribute('id')) {
              $nama2 = $nama2 . ', ';
          }
          //echo $nama2;
          //$readScholarship = scholarship::orderBy('id')->getAttribute('name');
          //echo $readScholarship;
      }
    }
    session()->put('namaa', Auth::User()->name);
    session()->put('nama', $nama2);
    session()->put('flag', 2);
    Auth::User()->notify(new TutorialPublished(Auth::User()));
    //echo $nama2;

    return view('matchme');
});

Auth::routes();

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
