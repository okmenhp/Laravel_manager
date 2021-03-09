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

// Route::get('/', 'ManagerController@index')->name('index');
Route::get('/', ['as' => 'admin.index', 'uses' => 'ManagerController@index']);

// Route::post('/store', 'ManagerController@store')->name('store');
Route::post('/store', ['as' => 'admin.user.store', 'uses' => 'ManagerController@store']);

// Route::get('/edit/{id}', 'ManagerController@edit')->name('edit');
Route::get('/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'ManagerController@edit']);

// Route::put('/update/{id}', 'ManagerController@update')->name('update');
Route::post('/update/{id}', ['as' => 'admin.user.update', 'uses' => 'ManagerController@update']);

// Route::delete('/delete/{id}', 'ManagerController@destroy')->name('delete');
Route::delete('/delete/{id}', ['as' => 'admin.user.destroy', 'uses' => 'ManagerController@destroy']);