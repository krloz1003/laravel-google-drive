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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/oficio', function () {
    return view('oficio');
});

Route::post('/upload', 'UploadController@upload');
Route::get('/files', 'UploadController@getFiles');
Route::get('/show/{filename}', 'UploadController@showFile');
