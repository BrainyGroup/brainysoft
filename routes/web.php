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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

//Employee routes
Route::get('/employees', 'EmployeeController@index');

Route::get('/employees/create', 'EmployeeController@create');

Route::post('/employees', 'EmployeeController@store');


Route::get('/pay', 'PayController@store');

Route::get('/employee', 'EmployeeController@create');




Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('pays', 'PayController');
