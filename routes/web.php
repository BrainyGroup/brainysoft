<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



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


// Route::get('/', function () {
//     return view('users.index');
// });

Auth::routes();

//Route::resource('centers', 'CenterController');

//Route::get('/centers', 'Payroll\CenterController@index')->name('centers');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reports', 'ReportController@index')->name('reports');

Route::resource('/users', 'Payroll\UserController');


// Auth::routes();

// Route::get('/contacts', function () {
//     return view('contacts');
// });




//Allowance routes

Route::get('welcome', 'Payroll\AllowanceController@welcome')->name('welcome');
Route::get('allow_typ_auto', 'Payroll\AllowanceController@allow_type_autocomp')->name('allow_typ_auto');


//$this->get('users/index', 'UserController@getUsersForDataTable')->name('users.table');



Route::resource('allowances', 'Payroll\AllowanceController');

// Route::get('allowance_details', 'AllowanceController@allowanceDetails');

//allowance types routes
Route::resource('allowance_types', 'Payroll\AllowanceTypeController');

//bank routes
Route::resource('banks', 'Payroll\BankController');

//center routes
Route::resource('centers', 'Payroll\CenterController');

//company routes
Route::resource('companies', 'Payroll\CompanyController');

//contribution route
// Route::resource('contributions', 'ContributionController');

//country routes
Route::resource('countries', 'Payroll\CountryController');

//deduction routes
Route::resource('deductions', 'Payroll\DeductionController');

//deduction type routes
Route::resource('deduction_types', 'Payroll\DeductionTypeController');

//department routes
Route::resource('departments', 'Payroll\DepartmentController');

//designation routes
Route::resource('designations', 'Payroll\DesignationController');

Route::resource('documentations', 'Payroll\DocumentationController');



//employees routes
Route::resource('employees', 'Payroll\EmployeeController');

//Kin type routes
Route::resource('kin_types', 'Payroll\KinTypeController');

//kin routes
Route::resource('kins', 'Payroll\KinController');

//Level routes
Route::resource('levels', 'Payroll\LevelController');

//Organization
Route::resource('organizations', 'Payroll\OrganizationController');

Route::get('/pays/create_previous', 'Payroll\PayController@previousCreate');

//pay routes
Route::resource('pays', 'Payroll\PayController');



Route::match(['put', 'patch'], '/pays/update/{id}','Payroll\PayController@post');

Route::get('/downloadPDF/{id}','Payroll\PayController@downloadPDF');

//paye routes
Route::resource('payes', 'Payroll\PayeController');

//payroll groups routes
Route::resource('payroll_groups', 'Payroll\PayrollGroupController');


//pay base routes
Route::resource('pay_types', 'Payroll\PayBaseController');

//role routes
Route::resource('roles', 'Payroll\RoleController');




//employment type routes
Route::resource('employment_types', 'Payroll\EmploymentTypeController');

//salary type route
Route::resource('salary_bases', 'Payroll\SalaryBaseController');

//salary route
Route::resource('salaries', 'Payroll\SalaryController');

//scale routes
Route::resource('scales', 'Payroll\ScaleController');

//setting route
Route::resource('settings', 'Payroll\SettingController');

//statutory type route
Route::resource('statutory_types', 'Payroll\StatutoryTypeController');

//statutory
Route::resource('statutories', 'Payroll\StatutoryController');

//statutory
Route::resource('employee_statutories', 'Payroll\EmployeeStatutoryController');

//users


//Route::get('/users/index', 'Payroll\UserController@index')->name('users');

//  Route::get('/users', 'UserController@getUsers');
// Route::delete('/users/{user}/delete', 'UserController@deleteUser');

//documentations

// Route::get('/documentations', 'Payroll\DocumentationController@index');

// Route::get('/documentations/login', 'Payroll\DocumentationController@login');

// Route::get('/documentations/home', 'Payroll\DocumentationController@home');

// Route::get('/documentations/user', 'Payroll\DocumentationController@user');

// Route::get('/documentations/employee', 'Payroll\DocumentationController@employee');

// Route::get('/documentations/earning', 'Payroll\DocumentationController@earning');

// Route::get('/documentations/report', 'Payroll\DocumentationController@report');

// Route::get('/documentations/setting', 'Payroll\DocumentationController@setting');

// Route::get('/documentations/user_profile', 'Payroll\DocumentationController@user_profile');

// //Route::get('/article','ArticleController@index')->name('article.form');

// Route::get('/documentations/create','Payroll\DocumentationController@create');
 
// Route::post('/documentations','Payroll\DocumentationController@store')->name('documentations');
 
// Route::get('/documentation/{id}','Payroll\DocumentationController@show');




//Reports

Route::get('/reports/net','Payroll\ReportController@net');


 Route::get('/reports/net_by_bank','Payroll\ReportController@netByBank');
 Route::get('/reports/paye','Payroll\ReportController@paye');
 Route::get('/reports','Payroll\ReportController@index');
 Route::post('/reports/current_pay','Payroll\ReportController@currentPay');
 Route::get('/reports/pay_details','Payroll\ReportController@payDetails');
 Route::get('/reports/monthly_create','Payroll\ReportController@monthlyCreate');
 Route::get('/reports/statutory_list','Payroll\ReportController@statutoryList');
 Route::get('/reports/net_list_by_bank','Payroll\ReportController@netListByBank');

 Route::get('/reports/create_user', 'Payroll\ReportController@createUser');

Route::get('/reports/index_user', 'Payroll\ReportController@indexUser');

Route::resource('/reports/users', 'Payroll\UsersController');

Route::resource('/reports/pays', 'Payroll\PaysController');

Route::get('/reports/employee_pay', 'Payroll\ReportController@pay_by_employee');

Route::get('/reports/monthly_summary', 'Payroll\ReportController@monthly_summary');

Route::get('/reports/monthly_create', 'Payroll\ReportController@monthlyCreate');

Route::get('/reports/yearly_create', 'Payroll\ReportController@yearlyCreate');

Route::get('/reports/yearly_pay', 'Payroll\ReportController@yearly_pay');

Route::get('/employee_payments/create', 'Payroll\EmployeePaymentController@create');

Route::post('/employee_payments', 'Payroll\EmployeePaymentController@store');

Route::get('/statutory_payments/create', 'Payroll\StatutoryPaymentController@create');



Route::post('/statutory_payments', 'Payroll\StatutoryPaymentController@store');


Route::get('/reports/paye_yearly_create', 'Payroll\ReportController@paye_yearly_create');

Route::get('/reports/paye_yearly', 'Payroll\ReportController@paye_yearly');



Route::get('/reports/paye_all', 'Payroll\ReportController@paye_all');



Route::get('/reports/statutory_yearly_create', 'Payroll\ReportController@statutory_yearly_create');

Route::get('/reports/statutory_yearly', 'Payroll\ReportController@statutory_yearly');


Route::get('/reports/statutory_all_create', 'Payroll\ReportController@statutory_all_create');

Route::get('/reports/statutory_all', 'Payroll\ReportController@statutory_all');



Route::get('/reports/statutory_employee_all_create', 'Payroll\ReportController@statutory_employee_all_create');

Route::get('/reports/statutory_employee_all', 'Payroll\ReportController@statutory_employee_all');






//Route::view('/admin', 'admin.dashboard.index');

Route::get('/basic_settings', 'Payroll\BasicSettingController@index')->name('basic_settings');
Route::post('/basic_settings', 'Payroll\BasicSettingController@update')->name('basic_settings.update');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/logout', function()
	{
		Auth::logout();
	  Session::flush();
		return Redirect('login');
	});