<?php

namespace BrainySoft\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use DB;

use Carbon\Carbon;

use BrainySoft\Company;

use BrainySoft\Statutory;

use BrainySoft\User;

use BrainySoft\Level;

use BrainySoft\Scale;

use BrainySoft\Center;

use BrainySoft\Bank;

use BrainySoft\Department;

use BrainySoft\Designation;

use BrainySoft\Employee;

use BrainySoft\Deduction;


class EmployeeController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }

    private function company()
    {
      $employee = Employee::find(auth()->user()->id);

      return Company::find($employee->company_id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{

        $company = $this->company();

        Log::debug($company->name.': Start employee index');

        // TODO: here you must fetch from user and use user id to fetch from employees see on user controller

        $employee = Employee::where('user_id', auth()->user()->id)->first();

        $employees = DB::table('employees')

        ->select(

          'employee_id',

          DB::raw('SUM(amount) as employee_amount'))

          ->where('employees.company_id', $employee->company_id)

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

      ->join('designations', 'employees.designation_id', '=', 'designations.id')

      ->joinSub($employees, 'employees', function($join) {

        $join->on('employees.id','employees.employee_id');

      })

      ->joinSub($deductions, 'deductions', function($join) {

        $join->on('employees.id', '=', 'deductions.employee_id');})

        ->select(

          'users.*',

          'employees.*',

          'salaries.amount as salary',

          'employees.*',

          'deductions.*',

          'centers.name as center_name',

          'designations.name as designation',

          'centers.description as center_description'

          )

          ->get();

          return view('employees.index', compact('employees'));

          //return view('employees.index')->with('employees', $employees);

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End employee index');

      }


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
      DB::table('employees')->insert([
              'amount' => 0.00,
              'employee_id' => $lastEmployeeId,
              'start_date' => now(),
              'end_date' => '3000-01-01',
              'company_id' => $loginEmployee->company_id,
              'employee_type_id' => 0,
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
    public function edit(Employee $employee)
    {
        return view('employees.edit');
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
    public function destroy(Employee $employee)
    {
      $employee = Employee::find($employee->id);

      if ($employee->delete()){

        return redirect('employees.index')

        ->with('success','Employee deleted successfully');

      }else{

        return back()->withInput()->with('error','Employee could not be deleted');

      }
    }
}
