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
Route::get('register', [
    'as' => 'register',
    'uses' => function () {
        return view('register');
    }
]);

Route::post('dologin', [
    'as' => 'dologin',
    'uses' => 'App\Http\Controllers\LoginController@login'
]);

Route::post('doregister', [
    'as' => 'doregister',
    'uses' => 'App\Http\Controllers\UserController@addUser'
]);
