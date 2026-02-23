<?php
use Modules\Vendor\Http\Controllers\VendorController;
Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Vendor\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('vendor/get', 'VendorTableController')->name('vendor.get');
            Route::post('deleted-vendors/get', 'DeletedVendorTableController')->name('deleted.vendor.get');
            /*
             * User CRUD
             */
            Route::get('vendors/deleted', [VendorController::class, 'deletedIndex'])->name('deleted.vendor');
            Route::get('vendors/{id}/restore', [VendorController::class, 'restore'])->name('vendor.restore');
            Route::resource('vendor', 'VendorController');
            Route::get('vendors/import', [VendorController::class, 'importShow'])->name('vendor.import');
            Route::post('vendors/import', [VendorController::class, 'import'])->name('import');
            Route::get('vendors/download/sample-csv', [VendorController::class, 'downloadSampleCSV'])->name('vendor.sample_csv');
});