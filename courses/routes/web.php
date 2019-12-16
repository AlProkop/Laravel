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
Route::post('addCourse', 'courseController@addCourse');
Route::post('addAssignment', 'assignmentController@addAssignment');

Route::get('getCourses', 'courseController@getCourses');
Route::get('getAssignments', 'assignmentController@getAssignments');

Route::put('updateCourse/{id}', 'courseController@updateCourse');
Route::put('updateAssignment/{id}', 'assignmentController@updateAssignment');

Route::delete('deleteAssignment/{id}', 'assignmentController@deleteAssignment');
