<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Shoptable\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('shoptable/get', 'ShoptableTableController')->name('shoptable.get');
            /*
             * Get tables by shop
             */
            Route::get('shoptable/get-by-shop/{shopId}', 'ShoptableController@getTablesByShop')->name('shoptable.get-by-shop');
            /*
             * User CRUD
             */
            Route::resource('shoptable', 'ShoptableController');
});