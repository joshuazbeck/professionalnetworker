<?php

use Illuminate\Support\Facades\Response;
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
        return view('login/login');
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
        return view('admin/admin');
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
Route::get('addUserToGroup/{group_id}', [
    'as' => 'addUserToGroup',
    'uses' => 'App\Http\Controllers\AffinityGroupsController@addUserToGroup'
]);
Route::get('removeUserFromGroup/{group_id}', [
    'as' => 'removeUserFromGroup',
    'uses' => 'App\Http\Controllers\AffinityGroupsController@removeUserFromGroup'
]);
Route::get('searchJobs', [
    'as' => 'searchJobs',
    'uses' => 'App\Http\Controllers\JobController@searchJobs'
]);
Route::post('doJobSearch', [
    'as' => 'doJobSearch',
    'uses' => 'App\Http\Controllers\JobController@doJobSearch'
]);
Route::get('applyForJob/{job_id}', [
    'as' => 'applyForJob',
    'uses' => 'App\Http\Controllers\JobController@applyForJob'
]);
Route::post('processApplication', [
    'as' => 'processApplication',
    'uses' => 'App\Http\Controllers\JobController@processApplication'
]);

Route::get('download/{file_name}', 'App\Http\Controllers\DownloadController@download');

Route::resource('profiles', App\Http\Controllers\ProfileController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('jobs', App\Http\Controllers\JobController::class);
Route::resource('jobHistory', App\Http\Controllers\JobHistoryController::class);
Route::resource('education', App\Http\Controllers\EducationController::class);
Route::resource('skills', App\Http\Controllers\SkillController::class);
Route::resource('affinitygroup', App\Http\Controllers\AffinityGroupsController::class);
Route::resource('jobrest', App\Http\Controllers\JobRestController::class);
