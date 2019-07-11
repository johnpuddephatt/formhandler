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

Auth::routes();

Route::get('/admin/users', 'UserController@index')->middleware('auth');
Route::post('/admin/users/add', 'UserController@store')->middleware('auth');

Route::get('/admin/users/{recipienthash}', 'SubmissionController@index')->middleware('auth');
Route::post('/{recipienthash}', 'SubmissionController@catch');
Route::get('/submission/{submissionhash}', 'SubmissionController@single')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');