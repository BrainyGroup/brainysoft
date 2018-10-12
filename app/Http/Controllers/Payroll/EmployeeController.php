<?php

// TODO: Option and mandatory statutory
// TODO: List salary and salary history for employees
//// TODO: List allowance and deduction for employees
// TODO: list next of kin for employees
//// TODO: list statutory for employees

namespace BrainySoft\Http\Controllers;

use DB;

use Exception;

use Carbon\Carbon;

use BrainySoft\Pay;

use BrainySoft\User;

use BrainySoft\Bank;

use BrainySoft\Level;

use BrainySoft\Scale;

use BrainySoft\Center;

use BrainySoft\Salary;

use BrainySoft\Company;

use BrainySoft\Employee;

use BrainySoft\Pay_base;

use BrainySoft\Deduction;

use BrainySoft\Statutory;

use BrainySoft\Department;

use BrainySoft\Designation;

use Illuminate\Http\Request;

use BrainySoft\Payroll_group;

use BrainySoft\Employment_type;

use Illuminate\Support\Facades\Log;


class EmployeeController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }

    private function company()
    {
      $user = User::find(auth()->user()->id);

      return Company::find($user->company_id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $company = $this->company();

          $employeeExist = Employee::where('company_id', $company->id)->exists();

          if(!$employeeExist){

            return redirect('users')->withInput()->with('error','Please add at least one employee to view employees');
          }

        Log::debug($company->name.': Start employee index');

        // TODO: here you must fetch from user and use user id to fetch from employees see on user controller

       // $employee = Employee::where('user_id', auth()->user()->id)->first();


        $allowances = DB::table('allowances')

        ->select(

          'employee_id',

          DB::raw('SUM(amount) as allowance_amount'))

          ->where('allowances.company_id', $company->id)

          ->groupBy('employee_id');


        $deductions = DB::table('deductions')

        ->select(

          'employee_id',

          DB::raw('SUM(amount) as deduction_amount'))

          ->where('deductions.company_id', $company->id)

          ->groupBy('employee_id');


      $employees = DB::table('employees')

      ->join('users', 'users.id','employees.user_id')

      ->join('salaries','employees.id', 'salaries.employee_id')

      ->join('centers', 'employees.center_id', '=', 'centers.id')

      ->join('designations', 'employees.designation_id', '=', 'designations.id')

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

          'designations.name as designation',

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

        $company = $this->company();

        $employeeExist = Employee::where('company_id', $company->id)->exists(); 

       

        $centers = Center::where('company_id', $company->id)->get();

        $departments = Department::where('company_id', $company->id)->get();

        $levels = Level::where('company_id', $company->id)->get();

        $scales = Scale::where('company_id', $company->id)->get();

        $banks = Bank::where('company_id', $company->id)->get();

        $designations = Designation::where('company_id', $company->id)->get();

        return view('employees.create', compact(
          'user',
          'payroll_groups',
          'pay_types',
          'employment_types',
          'centers',
          'levels',
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
      // TODO: add validation

      $company = $this->company();


      

      $userExit = Employee::where('user_id', request('user_id'))

      ->where('company_id', $company->id)

      ->exists();

      // TODO: check if user already on employee list of the company before adding

      if($userExit){

        return redirect('users')->with('error','User already exist as employee in this company');

            
      }else {



      // TODO:  work on employee store function is the taff one

      //update statutory table

      DB::transaction( function() use($company){

       



      $lastEmployeeId = DB::table('employees')->insertGetId([

        'company_id' =>  $company->id,

        'level_id' => request('payroll_group_id'),

        'center_id' => request('center_id'),

        'department_id' => request('department_id'),

        'designation_id'=> request('designation_id'),

        'start_date' => request('start_date'),

        'end_date' => request('start_date'),

        'identity' => Employee::max('identity') + 1,

        'department_id' => 1,

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
              'company_id' => $company->id,
              'allowance_type_id' => 0,
              'created_at' =>now(),
              'updated_at' =>now(),
        ]);


        DB::table('salaries')->insert([
                'company_id' => $company->id,
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
                'company_id' => $company->id,
                'deduction_type_id' => 0,
                'created_at' =>now(),
                'updated_at' =>now(),
          ]);


      $statutories = Statutory::where('company_id', $company->id)->get();

      //dd( $statutories);

      foreach($statutories as $statutory){

        // dd( $statutory->organization_id);

        DB::table('employee_statutory')->insert([
                'employee_id' => $lastEmployeeId,
                'statutory_id' => $statutory->id,
                'statutory_type_id' => $statutory->statutory_type_id,
                'organization_id' => $statutory->organization_id,
                'company_id' => $company->id,
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);      
      }

      });

      return back()->with('success','Employee added successfully');

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

          $company = $this->company();

          $employeeExist = Employee::where('company_id', $company->id)->exists();

          if(!$employeeExist){

            return redirect('users')->withInput()->with('error','Please add at least one employee to view employees');
          }

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

      $company = $this->company();

          $employeeExist = Employee::where('company_id', $company->id)->exists();

          if(!$employeeExist){

            return redirect('users')->withInput()->with('error','Please add at least one employee to view employees');
          }


        $user = User::find($employee->user_id);

        $employee_salary = Salary::where('employee_id',$employee->id)->first();

        $current_level = Level::find($employee->level_id);

        $current_salary_scale = Scale::find($employee->scale_id);

        $current_center = Center::find($employee->center_id);

        $current_designation = Designation::find($employee->designation_id);

        $current_department = Department::find($employee->department_id);

        $current_bank = Bank::find($employee->bank_id);

        $levels = Level::all();

        $scales = Scale::all();

        $centers = Center::all();

        $designations = Designation::all();

        $departments = Department::all();

        $banks = Bank::all();


        return view('employees.edit',compact(
          'employee',
          'employee_salary',
          'current_level',
          'current_salary_scale',
          'current_center',
          'current_designation',
          'current_department',
          'current_bank',
          'levels',
          'scales',
          'designations',
          'centers',
          'departments',
          'banks',
          'user'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {

      // TODO: update all item related to this employee
      //Validation
      $this->validate(request(),[

        'payroll_group_id' =>'required|string',

        'center_id' => 'required|string',

      ]);

      DB::beginTransaction();

      try{

        DB::table('employees')

        ->where('id', request('employee_id'))->update([

          'level_id' => request('payroll_group_id'),

          'center_id' => request('center_id'),

          'department_id' => request('department_id'),

          'designation_id'=> request('designation_id'),

          'start_date' => request('start_date'),

          'end_date' => request('start_date'),

          'level_id' => request('level_id'),

          'center_id' => request('center_id'),

          'scale_id' => request('scale_id'),

          'department_id' => request('department_id'),

          'designation_id'=> request('designation_id'),

          'start_date' => request('start_date'),

          'end_date' => request('start_date'),

          'department_id' => request('department_id'),

          'bank_id' => request('bank_id'),

          'account_number' => request('account_number'),

          'updated_at' =>now(),






        ]);

        DB::table('salaries')

        ->where('employee_id', request('employee_id'))->update([
          'amount' => request('salary'),
          'updated_at' => now(),
        ]);


            DB::commit();    // Commiting  ==> There is no problem whatsoever

              return redirect('employees')

              ->with('success','Employee updated successfully');


                  }catch (\Exception $e) {
                DB::rollback();   // rollbacking  ==> Something went wrong

                return back('employees')->withInput()

                ->with('error','Employee could not be updated');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {

     
      //// TODO: delete all item related to employee

      $employee_exist = Pay::where('employee_id',$employee->id)->exists();

      if (!$employee_exist){

       DB::transaction( function() use ($employee) {

            DB::table('employees')
            ->where('id', $employee->id)
            ->delete();

            DB::table('allowances')
            ->where('employee_id', $employee->id)
            ->delete();

            DB::table('deductions')
            ->where('employee_id', $employee->id)
            ->delete();


            DB::table('salaries')
            ->where('employee_id', $employee->id)
            ->delete();


            DB::table('employee_statutory')
            ->where('employee_id', $employee->id)
            ->delete();

          });
     
        return redirect('employees')

        ->with('success','Employee deleted successfully');

      }else{

        return back()->withInput()->with('error','Employee could not be deleted');

      }
    }
}
