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
use Illuminate\Support\Facades\Artisan;

/* ADMIN
Route::get('/', function () {
    return view('landing-page-admin');
})->name('home');   */

/* CUSTOMER CLIENT    */

Route::get('/', function () {
    return view('landing-page-client');
})->name('home');


/* untuk client */

/* untuk client  */
Route::get('/f/{token}', 'RespondenController@bitly')->name('form.bitly');
Route::post('/f/{token}', 'RespondenController@submit')->name('form.bitly.submit');

Route::get('akademik', function () {
    return view('akademik', [
        'page' => 'akademik',
    ]);
})->name('akademik');

/* untuk admin
Route::prefix('admin')->group(function () {
    Route::get('/', 'AuthController@index')->middleware('guest')->name('login');
    Route::post('/login', 'AuthController@login')->name('auth.login');
    Route::get('/logout', 'AuthController@logout')->middleware('auth')->name('auth.logout');
});   */

/* untuk client  */
Route::prefix('feature')->group(function () {
    Route::get('/', function () {
        dump('Hello World');
    });
    Route::prefix('form')->group(function () {
        Route::get('/', 'FeatureFormController@index')->name('f.form.index');
        Route::post('/', 'FeatureFormController@email')->name('f.form.email');
        Route::prefix('{token}')->group(function () {
            Route::get('/', 'FeatureFormController@show')->name('f.form.show');
            Route::get('/excel', 'FeatureFormController@excel')->name('f.form.excel');
            Route::post('/lock', 'FeatureFormController@lock')->name('f.form.lock');
            Route::put('/update', 'FeatureFormController@update')->name('f.form.update');
            Route::put('/bitly', 'FeatureFormController@bitly')->name('f.form.bitly');
            Route::delete('/delete', 'FeatureFormController@destroy')->name('f.form.delete');
            Route::prefix('pertanyaan')->group(function () {
                Route::post('/', 'FeatureFormController@qcreate')->name('f.form.pertanyaan.create');
                Route::post('/update/{qid}', 'FeatureFormController@qupdate')->name('f.form.pertanyaan.update');
                Route::delete('/delete/{qid}', 'FeatureFormController@qdestroy')->name('f.form.pertanyaan.destroy');
                Route::post('/sort', 'FeatureFormController@qsort')->name('f.form.pertanyaan.sort');
            });
        });
    });
});


/* untuk admin */
Route::prefix('form')->middleware('auth')->group(function () {
    Route::get('/', 'FormController@index')->name('form.index');
    Route::get('/create', 'FormController@index')->name('form.create');
    Route::post('/store', 'FormController@store')->name('form.store');
    Route::prefix('{id}')->group(function () {
        Route::get('/', 'FormController@show')->name('form.show');
        Route::post('/lock', 'FormController@lock')->name('form.lock');
        Route::get('/excel', 'FormController@excel')->name('form.excel');
        Route::put('/update', 'FormController@update')->name('form.update');
        Route::put('/bitly', 'FormController@updateBitly')->name('form.bitly');
        Route::delete('/destroy', 'FormController@destroy')->name('form.destroy');
        Route::prefix('pertanyaan')->group(function () {
            Route::post('/store', 'FormPertanyaanController@store')->name('pertanyaan.store');
            Route::post('/update/{qid}', 'FormPertanyaanController@update')->name('pertanyaan.update');
            Route::delete('/delete/{qid}', 'FormPertanyaanController@destroy')->name('pertanyaan.destroy');
            Route::post('/sort', 'FormPertanyaanController@sort')->name('pertanyaan.sort');
        });
    });
});

/* untuk admin */
Route::prefix('responden')->middleware('auth')->group(function () {
    Route::get('/', 'RespondenController@index')->name('responden.index');
    Route::get('/cari', 'RespondenController@cari')->name('responden.cari');
    Route::get('/show/{id}', 'RespondenController@show')->name('responden.show');
    Route::post('/store', 'RespondenController@store')->name('responden.store');
});

Route::prefix('chsi')->group(function () {
    /* untuk client */
    Route::get('/', 'ChsiController@index')->name('chsi.index');
    Route::prefix('curhat')->group(function () {
        Route::get('/', 'ChsiController@curhatindex')->name('curhat.index');
        Route::post('/submit', 'ChsiController@curhatsubmit')->name('curhat.submit');
        Route::get('/chat/{token}', 'ChsiController@curhatchat')->name('curhat.chat');
        Route::post('/chat', 'ChsiController@curhatfind')->name('curhat.find');
        Route::post('/chat/{token}', 'ChsiController@curhatchatsubmit')->name('curhat.chat.submit');
        Route::get('/finish', 'ChsiController@curhatfinish')->name('curhat.finish');
        Route::get('/finish/{token}', 'ChsiController@curhatfinishtoken')->name('curhat.finish.token');
    });

    Route::prefix('kritik')->group(function () {
        Route::get('/', 'ChsiController@kritikindex')->name('kritik.index');
        Route::get('/form/{bidang}', 'ChsiController@kritikform')->name('kritik.form');
        Route::post('/submit', 'ChsiController@kritiksubmit')->name('kritik.submit');
    });

    Route::prefix('meditasi')->group(function () {
        Route::get('/', 'ChsiController@meditasiindex')->name('meditasi.index');
        // Route::get('/{kategori}', 'ChsiController@meditasikategori')->name('meditasi.kategori');
    });

    /* untuk admin */
    Route::prefix('admin')->middleware('auth')->group(function () {
        Route::get('/', 'ChsiController@psdmindex')->name('chsi.admin.index');
        Route::prefix('curhat')->group(function () {
            Route::get('/', 'ChsiController@psdmcurhatindex')->name('chsi.admin.curhat.index');
            Route::get('/chat/{token}', 'ChsiController@psdmcurhatchat')->name('chsi.admin.curhat.chat');
            Route::post('/chat/{token}/chat', 'ChsiController@psdmcurhatchatsubmit')->name('chsi.admin.curhat.chat.submit');
            Route::post('/chat/{token}/motivasi', 'ChsiController@psdmcurhatmotivasisubmit')->name('chsi.admin.curhat.motivasi.submit');
        });
        Route::prefix('kritik')->group(function () {
            Route::get('/', 'ChsiController@psdmkritikindex')->name('chsi.admin.kritik.index');
        });
        Route::prefix('meditasi')->group(function () {
            Route::get('/', 'ChsiController@psdmmeditasiindex')->name('chsi.admin.meditasi.index');
        });
    });
});

Route::prefix('alumni')->group(function () {
    Route::get('/', 'AlumniController@index')->name('alumni.index');

    Route::prefix('admin')->middleware('auth')->group(function() {
        Route::get('/','AlumniController@adminindex')->name('admin.alumni.index');
    });
});
