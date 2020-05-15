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

Route::get('/task1', function () {
    return view('task1');
});

Route::get('/number', 'Controller@task1');

Route::get('/task2', function () {
    return view('task2');
});
Route::get('/searchprov', 'Controller@prov');
Route::get('/searchcity', 'Controller@city');
