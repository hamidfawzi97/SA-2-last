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
    return view('welcome');
});

Route::get('login','LoginController@index')->name('login');

Route::post('checkLogin', 'LoginController@checkLogin');

Route::get('logout', 'LoginController@logout');

Route::resource('Admin', 'UsersController');

Route::resource('Purchases', 'PurchaseController');

Route::resource('RepairDevices', 'RepairDevicesController');

Route::resource('Salary', 'SalaryController');

Route::resource('Lab', 'LabController');

Route::get('index', 'LabController@index')->name('index');

Route::get('index/getdata', 'LabController@getdata')->name('lab.getdata');

Route::post('Lab/search', 'LabController@search');

Route::resource('Patients', 'PatientsController');

Route::post('Patients/fetch', 'PatientsController@fetch');

Route::get('Patients/excel/{id}', 'PatientsController@excel')->name('Patients.excel');

Route::get('Patients/excel1/{id}', 'PatientsController@excel1')->name('Visits.excel');


Route::get('Visits/create/{patient_id}' , 'PatientsController@createVisit')->name('Visits.create');

Route::post('Visits/store' , 'PatientsController@storeVisit')->name('Visits.store');

Route::get('Visits/delete/{id}', 'PatientsController@deleteVisit')->name('Visits.delete');

Route::get('Visits/edit/{id}', 'PatientsController@editVisit')->name('Visits.edit');

Route::post('Visits/update/{id}', 'PatientsController@updateVisit')->name('Visits.update');

Route::get('Lab/excel/{id}', 'LabController@excel')->name('Labs.excel');

Route::resource('Financial','FinancialController');

Route::get('index', 'FinancialController@index')->name('index');

Route::post('Financial/search', 'FinancialController@search');
