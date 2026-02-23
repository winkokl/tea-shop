<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Shoptable\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('shoptable/get', 'ShoptableTableController')->name('shoptable.get');
            /*
             * User CRUD
             */
            Route::resource('shoptable', 'ShoptableController');
});