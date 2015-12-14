<?php

Route::group(['namespace' => 'Montoya\Crud\Controllers', 'prefix' => 'montoya/crud'], function () {
    Route::get('/', ['as' => 'montoya_home_path', 'uses' => 'CrudController@index']);
    Route::post('/', ['as' => 'montoya_generate_path', 'uses' => 'CrudController@generate']);
});