<?php
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

Route::get('/', [
    'as' => '/',
    'uses' => function () {
        return view('index');
    }
]);

Route::get('login', [
    'as' => 'login',
    'uses' => function () {
        return view('login');
    }
]);

Route::get('logout', [
    'as' => 'logout',
    'uses' => 'App\Http\Controllers\LoginController@log_out'
]);
Route::post('dologin', [
    'as' => 'dologin',
    'uses' => 'App\Http\Controllers\LoginController@login'
]);
Route::get('userinfo/{user}', [
    'as' => 'userinfo',
    'uses' => 'App\Http\Controllers\UserController@userinfo'
]);
Route::get('admin', [
    'as' => 'admin',
    'uses' => function () {
        return view('admin');
    }
]);
Route::get('editUserSkills/{user}', [
    'as' => 'editUserSkills',
    'uses' => 'App\Http\Controllers\SkillController@editUserSkills'
]);
Route::put('updateUserSkills/{user}', [
    'as' => 'updateUserSkills',
    'uses' => 'App\Http\Controllers\SkillController@updateUserSkills'
]);

Route::resource('profiles', App\Http\Controllers\ProfileController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('jobs', App\Http\Controllers\JobController::class);
Route::resource('jobHistory', App\Http\Controllers\JobHistoryController::class);
Route::resource('education', App\Http\Controllers\EducationController::class);
Route::resource('skills', App\Http\Controllers\SkillController::class);
