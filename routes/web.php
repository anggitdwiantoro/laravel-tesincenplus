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

Route::get('/tes','ControllerUser@index');
Route::post('/storeUser','ControllerUser@store');

Route::post('/login','ControllerLogin@index');

Route::get('/posts','ControllerPosts@index');
Route::get('/posts/{id}','ControllerPosts@get_post');
Route::post('/posts/add','ControllerPosts@store');
Route::post('/posts/edit/{id}','ControllerPosts@update');
