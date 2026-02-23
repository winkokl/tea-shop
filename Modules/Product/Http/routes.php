<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Product\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('product/get', 'ProductTableController')->name('product.get');
            /*
             * User CRUD
             */
            Route::resource('product', 'ProductController');
});