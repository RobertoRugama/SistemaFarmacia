<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return redirect()->route('login');
});

Auth::routes();
/*
Route::group(['middleware' => ['web']], fuction(){
	return ('task','TaskController');
});

Route::group(['middleware' => ['web']], fuction(){
	return::auth();
});
*/

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('provider','ProviderController');
Route::resource('laboratory','LaboratoryController');
Route::resource('category','CategoryController');
Route::resource('product','ProductController');
Route::resource('charge', 'ChargeController');
Route::resource('employee', 'EmployeeController');
Route::resource('detailproduct', 'DetailProductController');

Route::prefix('Invoice')->group(function() {
	Route::get('/', 'InvoiceController@index')->name('invoices');
    Route::get('getDataForShow', 'InvoiceController@getDataForShow');
    Route::post('/', 'InvoiceController@store');
});
	


