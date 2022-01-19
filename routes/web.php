<?php

/* login related routes */
Route::get('/', 'LoginController@Login')->name('login');
Route::post('login-action', 'LoginController@loginAction');

/* dashboard related route */

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('dashboard', 'DashboardController@index');
    Route::get('logout', 'LoginController@logout');
    Route::get('sample-test', 'DashboardController@sampleTest');
});

/* Category related route */

Route::get('category/list', 'CategoryController@index');
Route::get('category/create', 'CategoryController@create');
Route::post('category/store', 'CategoryController@store');
Route::get('category/edit', 'CategoryController@edit');
Route::put('category/{id}/update', 'CategoryController@store');
Route::get('category/delete', 'CategoryController@delete');

/*  Group related route */

Route::get('group/list', 'GroupController@index');
Route::get('group/create', 'GroupController@create');
Route::post('group/store', 'GroupController@store');
Route::get('group/edit', 'GroupController@edit');
Route::put('group/{id}/update', 'GroupController@store');
Route::get('group/delete', 'GroupController@delete');

/* Manufacturer related route*/

Route::get('manufacturer/list', 'ManufacturerController@index');
Route::get('manufacturer/create', 'ManufacturerController@create');
Route::post('manufacturer/store', 'ManufacturerController@store');
Route::get('manufacturer/edit', 'ManufacturerController@edit');
Route::put('manufacturer/{id}/update', 'ManufacturerController@store');
Route::get('manufacturer/delete', 'ManufacturerController@delete');


/* Unit related route*/


Route::get('unit/list', 'UnitController@index');
Route::get('unit/create', 'UnitController@create');
Route::post('unit/store', 'UnitController@store');
Route::get('unit/edit', 'UnitController@edit');
Route::put('unit/{id}/update', 'UnitController@store');
Route::get('unit/delete', 'UnitController@delete');

/* Medicine related route */

Route::get('medicine/list', 'MedicineController@index');
Route::get('medicine/create', 'MedicineController@create');
Route::post('medicine/store', 'MedicineController@store');
Route::get('medicine/edit', 'MedicineController@edit');
Route::put('medicine/{id}/update', 'MedicineController@store');
Route::get('medicine/delete', 'MedicineController@delete');

Route::get('get-medicine-name-by-manufacturer', 'MedicineController@getMedicineNameByManufacturer');
Route::get('get-medicine-html', 'MedicineController@getMedicineHtml');


/*Purchase related route*/

Route::get('purchase/list', 'PurchaseController@index');
Route::get('purchase/create', 'PurchaseController@create');
Route::post('purchase/store', 'PurchaseController@store');
Route::get('get-purchase-html', 'PurchaseController@getPurchaseHtml');
Route::get('get-unit-by-medicine', 'PurchaseController@getUnitByMedicine');
Route::get('purchase-search', 'PurchaseController@purchaseSearch');
Route::get('purchase/pdf-download', 'PurchaseController@pdfDownload');


/*Medicine sale related route */

Route::get('medicine_sale/list', 'MedicineSaleController@index');
Route::get('medicine_sale/create', 'MedicineSaleController@create');
Route::post('medicine_sale/store', 'MedicineSaleController@store');
Route::get('medicine_sale/edit', 'MedicineSaleController@edit');
Route::put('medicine_sale/{id}/update', 'MedicineSaleController@store');
Route::get('medicine_sale/delete', 'MedicineSaleController@delete');
Route::get('sale-html', 'MedicineSaleController@getSaleHtml');
Route::get('get_unit_by_medicine', 'MedicineSaleController@getUnitByMedicine');
Route::get('medicine_sale_search', 'MedicineSaleController@MedicineSaleSearch');
Route::get('medicine_sale/pdf-download', 'MedicineSaleController@pdfDownload');


/* reports */

Route::get('medicine/stock', 'ReportsController@stock');
Route::get('medicine/stock-report', 'ReportsController@stockReport');
Route::get('medicine/daily_sale', 'ReportsController@dailySale');
Route::get('medicine/daily_sale_report', 'ReportsController@dailySaleReport');






