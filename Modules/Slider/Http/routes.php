<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Slider\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('slider/get', 'SliderTableController')->name('slider.get');
            /*
             * User CRUD
             */
            Route::resource('slider', 'SliderController');
});