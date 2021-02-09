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

Route::prefix('dashboard')->name('dashboard.')->group(function() {
    Route::prefix('admin')->name('admin.')->group(function() {
        Route::get('/', 'AdminController@index')->name('index');
        Route::get('tambah', 'AdminController@tambah')->name('create');
        Route::post('tambah', 'AdminController@store')->name('store');
        Route::get('edit/{id}', 'AdminController@edit')->name('edit');
        Route::patch('edit/{id}', 'AdminController@update')->name('update');
        Route::delete('delete/{id}', 'AdminController@delete')->name('delete');
    });
    Route::prefix('pegawai')->name('pegawai.')->group(function() {
        Route::get('/', 'PegawaiController@index')->name('index');
        Route::get('tambah', 'PegawaiController@tambah')->name('create');
        Route::Post('tambah', 'PegawaiController@store')->name('store');
        Route::get('edit/{id}', 'PegawaiController@edit')->name('edit');
        Route::patch('edit/{id}', 'PegawaiController@update')->name('update');
        Route::delete('delete/{id}', 'PegawaiController@delete')->name('delete');
    });
    Route::prefix('member')->name('member.')->group(function() {
        Route::get('/', 'MemberController@index')->name('index');
        Route::get('tambah', 'MemberController@tambah')->name('create');
        Route::Post('tambah', 'MemberController@store')->name('store');
        Route::get('edit/{id_member}', 'MemberController@edit')->name('edit');
        Route::patch('edit/{id_member}', 'MemberController@update')->name('update');
        Route::delete('delete/{id}', 'MemberController@delete')->name('delete');
    });
    Route::prefix('buku')->name('buku.')->group(function () {
        Route::get('/', 'BukuController@index')->name('index');
        Route::get('tambah', 'BukuController@tambah')->name('create');
    });
});
