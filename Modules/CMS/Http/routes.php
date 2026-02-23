<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\CMS\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('cms/get', 'CMSTableController')->name('cms.get');
            /*
             * User CRUD
             */
            Route::resource('cms', 'CMSController');
});