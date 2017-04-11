<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'tea'], function(){
    
    Route::get('{id}', 'TeaApi@show')
        ->name('api.tea.show');
    
    Route::post('/', 'TeaApi@store')
        ->name('api.tea.store');
    
    Route::get('/', 'TeaApi@index')
        ->name('api.tea.index');
});

Route::group(['prefix' => 'recommendation'], function(){
    
    Route::get('/', 'RecommendationApi@index')
        ->name('api.recommendation.index');

    Route::get('query', 'RecommendationApi@query')
        ->name('api.recommendation.query');
});
