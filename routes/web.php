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
    return view('cakrawala');
})->name('home');

Route::prefix('form')->group(function() {

    Route::get('/','FormController@index')->name('form.index');
    Route::get('/create','FormController@create')->name('form.create');
    Route::post('/store','FormController@store')->name('form.store');
    Route::get('/show/{id}','FormController@show')->name('form.show');
    
    Route::prefix('pertanyaan')->group(function() {
        Route::post('/store','FormPertanyaanController@store')->name('pertanyaan.store');
        Route::get('/destroy/{id}','FormPertanyaanController@destroy')->name('pertanyaan.destroy');
    });
});

Route::prefix('responden')->group(function() {
    Route::get('/','RespondenController@index')->name('responden.index');
    Route::get('/show/{id}','RespondenController@show')->name('responden.show');
    Route::post('/store','RespondenController@store')->name('responden.store');
});

