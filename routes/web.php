<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/addimage','UploadController@store')->name('addimage');

Route::get('/upload','UploadController@index');
Route::get('/upload', 'ImageController@index');
Route::delete('/upload/{id}', 'UploadController@destroy')->name('deletefile');

Route::get('/editimage/{id}', 'UploadController@edit');

Route::post('/updateimage/{id}', 'UploadController@update');