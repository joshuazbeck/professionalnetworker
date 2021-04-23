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
Route::get('logout', [
    'as' => 'logout',
    'uses' => function () {
        session()->flush();
        return view('index');
    }
]);
Route::get('login', [
    'as' => 'login',
    'uses' => function () {
        return view('login');
    }
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

Route::resource('profiles', App\Http\Controllers\ProfileController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
