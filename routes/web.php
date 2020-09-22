<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/upload','UploadController@index');
Route::post('/addimage','UploadController@store')->name('addimage');

Route::get('/upload', 'ImageController@index');