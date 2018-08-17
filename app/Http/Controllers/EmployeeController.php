<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;



use Carbon\Carbon;

use App\Company;

use App\Statutory;

use App\User;

use App\Level;

use App\Scale;

use App\Center;

use App\Bank;

use App\Department;

use App\Designation;

use App\Employee;

use App\Allowance;

use App\Deduction;


class EmployeeController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      // TODO: here you must fetch from user and use user id to fetch from employees see on user controller

      $employee = Employee::where('user_id', auth()->user()->id)->first();

      $allowances = DB::table('allowances')

      ->select(

        'employee_id',

        DB::raw('SUM(amount) as allowance_amount'))

        ->where('allowances.company_id', $employee->company_id)

        ->groupBy('employee_id');


      $deductions = DB::table('deductions')

      ->select(

        'employee_id',

        DB::raw('SUM(amount) as deduction_amount'))

        ->where('deductions.company_id', $employee->company_id)

        ->groupBy('employee_id');


    $employees = DB::table('employees')

    ->join('users', 'users.id','employees.user_id')

    ->join('salaries','employees.id', 'salaries.employee_id')

    ->join('centers', 'employees.center_id', '=', 'centers.id')

    ->joinSub($allowances, 'allowances', function($join) {

      $join->on('employees.id','allowances.employee_id');

    })

    ->joinSub($deductions, 'deductions', function($join) {

      $join->on('employees.id', '=', 'deductions.employee_id');})

      ->select(

        'users.*',

        'employees.*',

        'salaries.amount as salary',

        'allowances.*',

        'deductions.*',

        'centers.name as center_name',

        'centers.description as center_description'

        )

        ->get();

        return view('employees.index', compact('employees'));

        //return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = User::find(request('user_id'));

        $levels = Level::all();

        $centers = Center::all();

        $departments = Department::all();

        $scales = Scale::all();

        $banks = Bank::all();

        $designations = Designation::all();

        return view('employees.create', compact(
          'user',
          'levels',
          'centers',
          'departments',
          'designations',
          'scales',
          'banks'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // TODO: check if user already on employee list of the company before adding




      $loginEmployee = Employee::where('user_id',auth()->user()->id)->first();

      $emp = Employee::where('user_id',request('user_id'))->where('company_id',$loginEmployee->company_id)->get();

      if(count($emp)>0){

        return redirect('users')->with('errors','User already employee');

      }else {



      // TODO:  work on employee store function is the taff one

      //update statutory table

      DB::transaction( function(){

        $loginEmployee = Employee::where('user_id',auth()->user()->id)->first();



      $lastEmployeeId = DB::table('employees')->insertGetId([

        'company_id' =>  $loginEmployee->company_id,

        'level_id' => request('level_id'),

        'center_id' => request('center_id'),

        'scale_id' => request('scale_id'),

        'department_id' => request('department_id'),

        'designation'=> request('designation_id'),

        'start_date' => request('start_date'),

        'end_date' => request('start_date'),

        'identity' => Employee::max('identity') + 1,

        'user_id' => request('user_id'),

        'bank_id' => request('bank_id'),

        'account_number' => request('account_number'),

        'created_at' =>now(),

        'updated_at' =>now(),

          ]);


    // TODO: check to see if the employee exist
    // TODO: dispay error iinformation if something went wrong
    // TODO: work on all hard codede value in employee
      DB::table('allowances')->insert([
              'amount' => 0.00,
              'employee_id' => $lastEmployeeId,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => $loginEmployee->company_id,
              'allowance_type_id' => 0,
              'created_at' =>now(),
              'updated_at' =>now(),
        ]);


        DB::table('salaries')->insert([
                'company_id' =>$loginEmployee->company_id,
                'employee_id' => $lastEmployeeId,
                'amount' => request('salary'),
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);


        DB::table('deductions')->insert([
                'amount' => 0.00,
                'employee_id' => $lastEmployeeId,
                'start_date' => now(),
                'end_date' => '3000-01-01',
                'company_id' => $loginEmployee->company_id,
                'deduction_type_id' => 0,
                'created_at' =>now(),
                'updated_at' =>now(),
          ]);


      $statutories = Statutory::where('company_id', $loginEmployee->company_id)->get();

      //dd( $statutories);

      foreach($statutories as $statutory){

        //dd( $statutory);

        DB::table('employee_statutory')->insert([
                'employee_id' => $lastEmployeeId,
                'statutory_id' => $statutory->id,
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);
        // $employee->statutories()->attach($statutory->id);
        // TODO: add company id for each entery uncomment the line below also use transaction
          // $employee->statutories()->attach($statutory->id,['company_id' =>   $loginEmployee->company_id]);
      }

      });

      return redirect('employees');

    }

  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {

        return view('employees.show',compact('employee'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
