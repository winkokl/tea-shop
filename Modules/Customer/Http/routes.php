<?php
use Modules\Customer\Http\Controllers\CustomerController;

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Customer\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('customer/get', 'CustomerTableController')->name('customer.get');
            /*
             * User CRUD
             */
            Route::resource('customer', 'CustomerController');
            
            Route::get('customers/export', [CustomerController::class, 'export'])->name('customer.export');
});