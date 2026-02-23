<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\RecycleBin\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('recyclebin/get', 'RecycleBinTableController')->name('recyclebin.get');
            /*
             * User CRUD
             */
            Route::resource('recyclebin', 'RecycleBinController');
});