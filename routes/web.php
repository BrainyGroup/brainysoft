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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Auth::routes();

// Route::get('/contacts', function () {
//     return view('contacts');
// });

// Route::get('/', function () {
//     return view('auth.login');
// });

// Route::get('/logout', function()
// 	{
// 		Auth::logout();
// 	  //Session::flush();
// 		return Redirect('login');
// 	});


//Allowance routes

Route::get('welcome', 'AllowanceController@welcome')->name('welcome');
Route::get('allow_typ_auto', 'AllowanceController@allow_type_autocomp')->name('allow_typ_auto');


$this->get('users/index', 'UserController@getUsersForDataTable')->name('users.table');



Route::resource('allowances', 'AllowanceController');

// Route::get('allowance_details', 'AllowanceController@allowanceDetails');

//allowance types routes
Route::resource('allowance_types', 'AllowanceTypeController');

//bank routes
Route::resource('banks', 'BankController');

//center routes
Route::resource('centers', 'CenterController');

//company routes
Route::resource('companies', 'CompanyController');

//contribution route
// Route::resource('contributions', 'ContributionController');

//country routes
Route::resource('countries', 'CountryController');

//deduction routes
Route::resource('deductions', 'DeductionController');

//deduction type routes
Route::resource('deduction_types', 'DeductionTypeController');

//department routes
Route::resource('departments', 'DepartmentController');

//designation routes
Route::resource('designations', 'DesignationController');

//employees routes
Route::resource('employees', 'EmployeeController');

//Kin type routes
Route::resource('kin_types', 'KinTypeController');

//kin routes
Route::resource('kins', 'KinController');

//Level routes
Route::resource('levels', 'LevelController');

//Organization
Route::resource('organizations', 'OrganizationController');

//pay routes
Route::resource('pays', 'PayController');

Route::match(['put', 'patch'], '/pays/update/{id}','PayController@post');

Route::get('/downloadPDF/{id}','PayController@downloadPDF');

//paye routes
Route::resource('payes', 'PayeController');

//payroll groups routes
Route::resource('payroll_groups', 'PayrollGroupController');


//pay base routes
Route::resource('pay_types', 'PayBaseController');


//employment type routes
Route::resource('employment_types', 'EmploymentTypeController');

//salary type route
Route::resource('salary_bases', 'SalaryBaseController');

//salary route
Route::resource('salaries', 'SalaryController');

//scale routes
Route::resource('scales', 'ScaleController');

//setting route
Route::resource('settings', 'SettingController');

//statutory type route
Route::resource('statutory_types', 'StatutoryTypeController');

//statutory
Route::resource('statutories', 'StatutoryController');

//statutory
Route::resource('employee_statutories', 'EmployeeStatutoryController');

//users
 Route::resource('users', 'UserController');




//Reports

Route::get('/reports/net','ReportController@net');


 Route::get('/reports/net_by_bank','ReportController@netByBank');
 Route::get('/reports/paye','ReportController@paye');
 Route::get('/reports','ReportController@index');
 Route::post('/reports/current_pay','ReportController@currentPay');
 Route::get('/reports/pay_details','ReportController@payDetails');
 Route::get('/reports/monthly_create','ReportController@monthlyCreate');
 Route::get('/reports/statutory_list','ReportController@statutoryList');
 Route::get('/reports/net_list_by_bank','ReportController@netListByBank');

 Route::get('/reports/create_user', 'ReportController@createUser');
Route::get('/reports/index_user', 'ReportController@indexUser');

Route::resource('/reports/users', 'UsersController');

Route::resource('/reports/pays', 'PaysController');