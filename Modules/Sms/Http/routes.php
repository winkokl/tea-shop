<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Sms\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('sms/get', 'SmsTableController')->name('sms.get');
            /*
             * User CRUD
             */
            Route::resource('sms', 'SmsController');
});