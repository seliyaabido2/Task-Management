<?php
use Illuminate\Support\Facades\Route;

// Task Route
Route::resource('task', 'TaskController');
Route::post('task/get','TaskController@getTask')->name('task.get');


