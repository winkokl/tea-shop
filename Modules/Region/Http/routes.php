<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Region\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('region/get', 'RegionTableController')->name('region.get');
            /*
             * User CRUD
             */
            Route::resource('region', 'RegionController');
});