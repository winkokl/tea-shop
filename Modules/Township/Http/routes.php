<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Township\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('township/get', 'TownshipTableController')->name('township.get');
            /*
             * User CRUD
             */
            Route::resource('township', 'TownshipController');
});