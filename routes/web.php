<?php
use App\Routes\Route;
use App\Controllers\CarController;
use App\Controllers\CustomerController;
use App\Controllers\EmployeeController;
use App\Controllers\RentalController;
use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Providers\View;


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

Route::get('/clients', 'ClientController@index');
Route::get('/client/show', 'ClientController@show');
Route::get('/client/create', 'ClientController@create');
Route::post('/client/store', 'ClientController@store');
Route::get('/client/edit', 'ClientController@edit');
Route::post('/client/edit', 'ClientController@update');
Route::post('/client/delete', 'ClientController@delete');

Route::get('/user/create', 'UserController@create');
Route::get('/user/journal', 'UserController@journal');
Route::post('/user/store', 'UserController@store');

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');

Route::get('/user/envoyer-mail', 'UserController@getMailForm');
Route::post('/user/envoyer-mail', 'UserController@envoyerMail');

Route::get('/user/journal', 'JournalController@index');


// Dispatch
Route::dispatch();

