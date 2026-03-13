<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Product\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('product/get', 'ProductTableController')->name('product.get');
            /*
             * Get products by shop
             */
            Route::get('product/get-by-shop/{shopId}', 'ProductController@getProductsByShop')->name('product.get-by-shop');
            /*
             * User CRUD
             */
            Route::resource('product', 'ProductController');
});