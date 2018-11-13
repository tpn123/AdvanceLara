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
Route::get('/local/{lang?}', function ($lang=null) {
	App::setlocale($lang);
	return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/sendmail', function () {
	\App\User::find(1)->notify(new \App\Notifications\taskcompleted());
	return view('welcome');
});

Route::get('markasread', function () {
	auth()->user()->unreadNotifications->markAsRead();
	return redirect()->back();
})->name('markread');

Route::get('/form','formController@index');
Route::post('/formSubmit','formController@store');

Route::get('/search','searchController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/*****AdminLogin****/
Route::get('admin/dashboard','AdminController@index')->name('admin.dashboard');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@login');
Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset','Admin\ResetPasswordController@reset');
Route::get('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

