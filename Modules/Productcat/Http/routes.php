<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Productcat\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('productcat/get', 'ProductcatTableController')->name('productcat.get');
            /*
             * User CRUD
             */
            Route::resource('productcat', 'ProductcatController');
});