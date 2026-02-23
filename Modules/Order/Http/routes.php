<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Order\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('order/get', 'OrderTableController')->name('order.get');
            /*
             * User CRUD
             */
            Route::resource('order', 'OrderController');
});