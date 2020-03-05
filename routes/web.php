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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'KegiatanController@home')->name('home');

// route ini hanya bisa di akses ketika user sudah verified
Route::prefix('kegiatans')->middleware('verified')->group(function () {
    Route::get('/', 'KegiatanController@index')->name('kegiatans.index');
    Route::get('/tambah', 'KegiatanController@create')->name('kegiatans.create');
    Route::get('/{kegiatan}/edit', 'KegiatanController@edit')->name('kegiatans.edit');
    Route::get('/{kegiatan}', 'KegiatanController@show')->name('kegiatans.show');
    Route::put('/{kegiatan}', 'KegiatanController@update')->name('kegiatans.update');
    Route::post('/tambah', 'KegiatanController@store')->name('kegiatans.store');
});

Route::prefix('users')->middleware('verified')->group(function () {
    Route::get('/', 'UserController@index')->name('users.index');
});


// route ini hanya untuk admin saja
Route::prefix('admins')->middleware(['is_admin', 'verified'])->group(function () {
    Route::get('/', 'UserController@list')->name('admins.index');
    Route::get('/kegiatan', 'UserController@kegiatan')->name('admins.kegiatan');
    Route::post('/', 'UserController@store')->name('admins.store');
    Route::get('/create', 'UserController@create')->name('admins.create');
    Route::get('/destroyed', 'UserController@destroyed')->name('admins.destroyed');
    Route::get('/{admin}/edit', 'UserController@edit')->name('admins.edit')->middleware('check_admin'); //->middleware('is_self');
    Route::put('/{admin}', 'UserController@update')->name('admins.update');
    Route::delete('/{admin}', 'UserController@destroy')->name('admins.destroy');
    Route::get('get-user-data', 'DatatablesController@userData')->name('datatables.user');
    Route::get('get-destroyed-data', 'DatatablesController@destroyedData')->name('datatables.destroyed');
    Route::put('/destroyed/{admin}', 'UserController@restore')->name('admins.restore');
    Route::delete('/force/{admin}', 'UserController@force_delete')->name('admins.force_delete');
});
