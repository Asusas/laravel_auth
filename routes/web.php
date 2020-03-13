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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Auth::routes();

// ___________________________________________________________________________________

Route::get('/', 'NewsController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('news', 'NewsController');
Route::resource('comments', 'CommentController');
Route::resource('categories', 'CategoryController');

// To do list routes:

Route::get('/task', 'TaskController@index')->name('task.index');
Route::post('/task', 'TaskController@store')->name('task.store');
Route::get('/task/completed/{id}', 'TaskController@complete')->name('task.completed');
Route::get('/task/deleted/{id}', 'TaskController@delete')->name('task.deleted');
Route::get('/task/return/{id}', 'TaskController@return')->name('task.return');