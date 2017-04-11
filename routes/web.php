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

Route::get('/', 'TeaController@index')
        ->name('tea.index');

Route::group(['prefix' => 'tea'], function(){

    Route::get('create', 'TeaController@create')
        ->name('tea.create');

    Route::post('/', 'TeaController@store')
        ->name('tea.store');

    Route::get('{tea}', 'TeaController@show')
        ->name('tea.show');
});
