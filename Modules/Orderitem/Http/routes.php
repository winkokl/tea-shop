<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Orderitem\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('orderitem/get', 'OrderitemTableController')->name('orderitem.get');
            /*
             * User CRUD
             */
            Route::resource('orderitem', 'OrderitemController');
});