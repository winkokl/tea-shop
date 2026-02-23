<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Shop\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('shop/get', 'ShopTableController')->name('shop.get');
            /*
             * User CRUD
             */
            Route::resource('shop', 'ShopController');
});