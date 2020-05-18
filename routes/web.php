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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
//home
Route::get('/home', 'HomeController@index')->name('home');

//register
Route::post('/save-register', 'Admin\RegisterController@saveRegister');

//verification of otp
Route::post('/verify-otp', 'Admin\RegisterController@verifyOtp');

//checking otp
Route::post('/check-otp', 'Admin\RegisterController@checkOtp');
Route::get('/success', function () {
    return view('auth.passwords.success');
});



Route::group( ['middleware' => ['auth']], function() {
    Route::resource('users', 'UserController');
 
});

 //Profile
 Route::resource('profile', 'Admin\ProfileController');
 Route::post('/upload-user-profile-photo', 'Admin\ProfileController@updateUserProfileImage');
 Route::get('/my-profile', 'Admin\ProfileController@getProfile');
 Route::get('/edit-profile', 'Admin\ProfileController@index');
 Route::get('/save-profile', 'Admin\ProfileController@saveProfile');

//logout
 Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
 



