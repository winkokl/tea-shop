<?php
use Modules\Employee\Http\Controllers\EmployeeController;

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Employee\Http\Controllers'], function()
{
    /*
     * For DataTables
     */
    Route::post('employee/get', 'EmployeeTableController')->name('employee.get');
    /*
     * Employee CRUD
     */
    Route::resource('employee', 'EmployeeController');
});
