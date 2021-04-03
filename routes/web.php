<?php

use Illuminate\Support\Facades\Route;

Route::get('clear', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');

    return '<h1>Cache Clear</h1>';
});

Route::prefix('/')->name('login.')->group(function () {
    Route::get('/', 'LoginController@index')->name('index');
    Route::post('login', 'LoginController@login')->name('proses');
});


Route::middleware(['auth.admin'])->prefix('administrator')->name('admin.')->group(
    function () {
        Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
        Route::get('/logout', 'LoginController@logoutAdmin')->name('logoutAdmin');

        Route::prefix('member_log')->name('member.')->group(function () {
            // Route::get('/', 'MemberController@index')->name('index');
            Route::get('/', function () {
                return view('member_log.index');
            });
        });

        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/', 'Admin\AdminController@index')->name('index');
            Route::get('tambah', 'Admin\AdminController@tambah')->name('create');
            Route::post('tambah', 'Admin\AdminController@store')->name('store');
            Route::get('edit/{id}', 'Admin\AdminController@edit')->name('edit');
            Route::patch('edit/{id}', 'Admin\AdminController@update')->name('update');
            Route::delete('delete/{id}', 'Admin\AdminController@delete')->name('delete');
        });
        Route::prefix('member')->name('member.')->group(function () {
            Route::get('/', 'Admin\MemberController@index')->name('index');
            Route::get('tambah', 'Admin\MemberController@tambah')->name('create');
            Route::Post('tambah', 'Admin\MemberController@store')->name('store');
            Route::get('edit/{id_member}', 'Admin\MemberController@edit')->name('edit');
            Route::patch('edit/{id_member}', 'Admin\MemberController@update')->name('update');
            Route::delete('delete/{id}', 'Admin\MemberController@delete')->name('delete');
        });
        Route::prefix('buku')->name('buku.')->group(function () {
            Route::get('/', 'Admin\BukuController@index')->name('index');
            Route::get('tambah', 'Admin\BukuController@tambah')->name('create');
            Route::Post('tambah', 'Admin\BukuController@store')->name('store');
            Route::get('edit/{id_buku}', 'Admin\BukuController@edit')->name('edit');
            Route::patch('edit/{id_buku}', 'Admin\BukuController@update')->name('update');
            Route::delete('delete/{id_buku}', 'Admin\BukuController@delete')->name('delete');
        });
        Route::prefix('denda')->name('denda.')->group(function () {
            Route::get('/', 'Admin\DendaController@index')->name('index');
            Route::get('tambah', 'Admin\DendaController@tambah')->name('create');
            Route::Post('tambah', 'Admin\DendaController@store')->name('store');
            Route::get('edit/{id_denda}', 'Admin\DendaController@edit')->name('edit');
            Route::patch('edit/{id_denda}', 'Admin\DendaController@update')->name('update');
            Route::delete('delete/{id_denda}', 'Admin\DendaController@delete')->name('delete');
        });
    }
);
