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

Route::get('/','HomeController@index');
Route::get('/dashboard','HomeController@dashboard');
Route::get('/show-login','HomeController@show_login');

//login-register
Route::post('/login','HomeController@login');
Route::get('/logout','HomeController@logout');
Route::get('/show-register','HomeController@show_register');
Route::post('/register','HomeController@register');

//today-job
Route::get('/today-complete','HomeController@today_complete');
Route::get('/today-uncomplete','HomeController@today_uncomplete');

//add-job
Route::get('/add-job','HomeController@add_job');
Route::post('/save-job','HomeController@save_job');
Route::get('/show-job','HomeController@show_job');

//update-status
Route::get('/update-status/{job_title}','HomeController@update_status');

//edit-job
Route::get('/edit-job/{job_title}','HomeController@edit_job');
Route::post('/update-job/{job_id}','HomeController@update_job');

//delete-job
Route::get('/delete-job/{job_title}','HomeController@delete_job');

//calendal
Route::get('/calendar','HomeController@calendar');