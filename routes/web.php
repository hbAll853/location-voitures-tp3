<?php
use App\Routes\Route;
use App\Controllers\CarController;
use App\Controllers\CustomerController;
use App\Controllers\EmployeeController;
use App\Controllers\RentalController;
use App\Controllers\HomeController;

// Route d'accueil
Route::get('/home', 'HomeController@index');

// Routes pour Car
Route::get('/car', 'CarController@index');
Route::get('/car/create', 'CarController@create');
Route::post('/car/store', 'CarController@store');
Route::get('/car/show', 'CarController@show');
Route::get('/car/edit', 'CarController@edit');
Route::post('/car/update', 'CarController@update');
Route::post('/car/delete', 'CarController@delete');

// Routes pour Customer
Route::get('/customer', 'CustomerController@index');
Route::get('/customer/create', 'CustomerController@create');
Route::post('/customer/store', 'CustomerController@store');
Route::get('/customer/show', 'CustomerController@show');
Route::get('/customer/edit', 'CustomerController@edit');
Route::post('/customer/update', 'CustomerController@update');
Route::post('/customer/delete', 'CustomerController@delete');

// Routes pour Employee
Route::get('/employee', 'EmployeeController@index');
Route::get('/employee/create', 'EmployeeController@create');
Route::post('/employee/store', 'EmployeeController@store');
Route::get('/employee/show', 'EmployeeController@show');
Route::get('/employee/edit', 'EmployeeController@edit');
Route::post('/employee/update', 'EmployeeController@update');
Route::post('/employee/delete', 'EmployeeController@delete');

// Routes pour Rental
Route::get('/rental', 'RentalController@index');
Route::get('/rental/create', 'RentalController@create');
Route::post('/rental/store', 'RentalController@store');
Route::get('/rental/show', 'RentalController@show');
Route::get('/rental/edit', 'RentalController@edit');
Route::post('/rental/update', 'RentalController@update');
Route::post('/rental/delete', 'RentalController@delete');

// Dispatch
Route::dispatch();
