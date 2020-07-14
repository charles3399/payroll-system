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

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
    Route::resource('employees', 'EmployeesController');

    Route::resource('positions', 'PositionsController');

    Route::resource('payrolls', 'PayrollController');

    Route::get('users/profile-settings','UsersController@profile')->name('users.profile');

    Route::get('/change-password', 'Auth\ChangePasswordController@index')->name('users.change-password');

    Route::post('/change-password', 'Auth\ChangePasswordController@changepassword')->name('users.password-update');
});


