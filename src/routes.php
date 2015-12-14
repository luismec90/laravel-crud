<?php

Route::group(['namespace' => 'Montoya\Crud\Controllers', 'prefix' => 'montoya/crud'], function () {
    Route::get('/', 'CrudController@index');
});