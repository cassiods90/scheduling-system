<?php

use Illuminate\Http\Request;

Route::group(['prefix'=>'files', 'namespace' => 'App\Http\Controllers', 'middleware' => []], function () {

    Route::group(['prefix'=>'upload'], function () {
        Route::post('temp', 'UploadedFilesController@addTempFile');
    });
});