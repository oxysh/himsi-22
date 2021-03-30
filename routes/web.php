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

use Illuminate\Support\Facades\Route;

// ADMIN
Route::get('/', function () {
    return view('oldcakrawala');
})->name('home');

// CUSTOMER CLIENT
// Route::get('/', function () {
//     return view('cakrawala');
// })->name('home');

Route::prefix('regist')->group(function () {
    Route::get('/', 'RespondenController@regist')->name('regist.index');
    Route::get('/cari', 'RespondenController@registcari')->name('regist.cari');
    Route::post('/store', 'RespondenController@registstore')->name('regist.store');
    Route::get('/thanks', function () {
        return view('client.thanks');
    })->name('regist.thanks');
});

Route::get('/f/{token}', 'RespondenController@bitly')->name('form.bitly');


Route::get('akademik', function () {
    return view('akademik');
})->name('akademik');


Route::prefix('admin')->group(function () {
    Route::get('/', 'AuthController@index')->middleware('guest')->name('login');
    Route::post('/login', 'AuthController@login')->name('auth.login');
    Route::get('/logout', 'AuthController@logout')->middleware('auth')->name('auth.logout');
});


Route::prefix('form')->middleware('auth')->group(function () {

    Route::get('/', 'FormController@index')->name('form.index');
    Route::get('/create', 'FormController@create')->name('form.create');
    Route::get('/excel/{id}', 'FormController@excel')->name('form.excel');
    Route::get('/lock/{id}', 'FormController@lock')->name('form.lock');
    Route::prefix('/show/{id}')->group(function () {
        Route::get('/', 'FormController@show')->name('form.show');
        Route::prefix('penjawab')->group(function () {
            Route::get('/{pid}', 'RespondenController@edit')->name('form.penjawab.edit');
            Route::post('/update/{pid}', 'RespondenController@update')->name('form.penjawab.update');
            Route::get('/destroy/{pid}', 'RespondenController@destroy')->name('form.penjawab.destroy');
        });
    });
    Route::post('/store', 'FormController@store')->name('form.store');
    Route::post('/update/{id}', 'FormController@update')->name('form.update');
    Route::post('/bitly/{id}', 'FormController@updateBitly')->name('form.update.bitly');
    Route::prefix('pertanyaan')->group(function () {
        Route::post('/store', 'FormPertanyaanController@store')->name('pertanyaan.store');
        Route::post('/update', 'FormPertanyaanController@update')->name('pertanyaan.update');
        Route::post('/sort', 'FormPertanyaanController@sort')->name('pertanyaan.sort');
        Route::get('/destroy/{id}', 'FormPertanyaanController@destroy')->name('pertanyaan.destroy');
    });
    Route::put('destroy/{id}', 'FormController@destroy')->name('form.destroy');
});

Route::prefix('responden')->middleware('auth')->group(function () {
    Route::get('/', 'RespondenController@index')->name('responden.index');
    Route::get('/cari', 'RespondenController@cari')->name('responden.cari');
    Route::get('/show/{id}', 'RespondenController@show')->name('responden.show');
    Route::post('/store', 'RespondenController@store')->name('responden.store');
});

Route::prefix('chsi')->group(function () {
    Route::get('/', 'ChsiController@index')->name('chsi.index');
    Route::prefix('curhat')->group(function () {
        Route::get('/', 'ChsiController@curhatindex')->name('curhat.index');
        Route::get('/form', 'ChsiController@curhatform')->name('curhat.form');
        Route::post('/submit', 'ChsiController@curhatsubmit')->name('curhat.submit');
        // Route::get('/chat','ChsiController@curhatchat')->name('curhat.chat');
        Route::post('/chat', 'ChsiController@curhatchat')->name('curhat.chat');
        Route::get('/finish', 'ChsiController@curhatfinish')->name('curhat.finish');
    });

    Route::prefix('kritik')->group(function () {
        Route::get('/', 'ChsiController@kritikindex')->name('kritik.index');
        Route::get('/form/{bidang}', 'ChsiController@kritikform')->name('kritik.form');
        Route::post('/submit', 'ChsiController@kritiksubmit')->name('kritik.submit');
    });

    Route::prefix('meditasi')->group(function () {
        Route::get('/', 'ChsiController@meditasiindex')->name('meditasi.index');
        Route::get('/{kategori}', 'ChsiController@meditasikategori')->name('meditasi.kategori');
    });

    Route::prefix('admin')->middleware('auth')->group(function () {
        Route::get('/', 'ChsiController@psdmindex')->name('chsi.admin.index');
        Route::prefix('curhat')->group(function () {
            Route::get('/', 'ChsiController@psdmcurhatindex')->name('chsi.admin.curhat.index');
            Route::get('/chat/{kode}', 'ChsiController@psdmcurhatchat')->name('chsi.admin.curhat.chat');
        });
        Route::prefix('kritik')->group(function () {
            Route::get('/', 'ChsiController@psdmkritikindex')->name('chsi.admin.kritik.index');
        });
    });
});
