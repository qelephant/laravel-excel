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
Route::get('/', 'UploadController@index')->name('index');
Route::get('datatable', 'UploadController@datatable')->name('datatable');

Route::post('excel-import', 'UploadController@import')->name('excel-import');
Route::get('show/{id}', 'UploadController@show')->name('show');

