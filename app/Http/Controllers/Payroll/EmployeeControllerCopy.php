<?php

// TODO: Option and mandatory statutory
// TODO: List salary and salary history for employees
//// TODO: List allowance and deduction for employees
// TODO: list next of kin for employees
//// TODO: list statutory for employees

namespace BrainySoft\Http\Controllers\Payroll;

use Exception;

use Carbon\Carbon;

use BrainySoft\Payroll\Pay;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Bank;

use BrainySoft\Payroll\Level;

use BrainySoft\Payroll\Scale;

use BrainySoft\Payroll\Center;

use BrainySoft\Payroll\Salary;

use BrainySoft\Payroll\Company;

use BrainySoft\Payroll\Employee;

use BrainySoft\Payroll\Pay_base;

use BrainySoft\Payroll\Deduction;

use BrainySoft\Payroll\Statutory;

use BrainySoft\Payroll\Department;

use BrainySoft\Payroll\Designation;

use Illuminate\Http\Request;

use BrainySoft\Payroll\Payroll_group;

use BrainySoft\Payroll\Statutory_type;

use BrainySoft\Payroll\Employment_type;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

use BrainySoft\Http\Controllers\Controller;


class EmployeeControllerCopy extends Controller
{
    public function __construct()
    {

        //$this->middleware('auth');
        $this->middleware('role');

    }

    private function company()
    {      
      
      return User::find(auth()->user()->id)->company;
      
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

          DB::raw('SUM(balance) as deduction_amount'))

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


        $statutories = Statutory::where(

        'statutories.company_id', $company->id)

        ->join('statutory_types', 'statutory_types.id','statutories.statutory_type_id')

       // ->where('statutory_types.selected', true)

         ->select(

          'statutories.*',        

          'statutory_types.*',

          'statutory_types.name as statutory_type_name',

          'statutories.name as statutory_name',

          'statutories.id as statutory_id'


          ) 

        ->get();

        $selected_statutory_types = Statutory_type::where(

          'company_id', $company->id
        )
       // ->where('selected', true)

        ->get();



        $employeeExist = Employee::where('company_id', $company->id)->exists(); 

       

        $centers = Center::where('company_id', $company->id)->get();

        $departments = Department::where('company_id', $company->id)->get();

        $levels = Level::all();

        $scales = Scale::where('company_id', $company->id)->get();

        $banks = Bank::where('country_id', $company->country_id)->get();

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
          'selected_statutory_types',
          'statutories',
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

      $user= User::where('id', request('user_id'))

            ->where('company_id', $company->id)->first();

      //$age = now()-$user->dob;


      

      $userExists = Employee::where('user_id', request('user_id'))

      ->where('company_id', $company->id)

      ->exists();

      // TODO: check if user already on employee list of the company before adding

      if($userExists){

        return redirect('users')->with('error','User already exist as employee in this company');

            
      }else {

      

      

      



      // TODO:  work on employee store function is the taff one

      //update statutory table

      DB::transaction( function() use($company,$user){    

      $user = User::find(request('user_id'));


      $dob = Carbon::parse($user->dob);


      $lastEmployeeId = DB::table('employees')->insertGetId([


        'company_id' =>  $company->id,        

        'center_id' => request('center_id'),

        'department_id' => request('department_id'),

        'designation_id'=> request('designation_id'),

        'start_date' => request('start_date'),

        'end_date' => Carbon::parse($user->dob)->addYears(60),

        'identity' => Employee::max('identity') + 1,

        'department_id' => request('department_id'),

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
              'allowance_type_id' => 1,
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
                'interest' => 0,
                'interest_amount' => 0,
                'date_taken' => now(),
                'period' => 0,
                'total_amount' => 0.00,
                'status' => 10,
                'balance' => 0,
                'monthly_amount' => 0.00,
                'employee_id' => $lastEmployeeId,
                'start_date' => now(),
                'end_date' => '3000-01-01',
                'company_id' => $company->id,
                'deduction_type_id' => 1,
                'created_at' =>now(),
                'updated_at' =>now(),
          ]);    


      $statutories = Statutory::where(

        'statutories.company_id', $company->id)
     

        ->where('statutories.selection', 0)

         ->select(

          'statutories.*'

          )


        ->get();

      //dd( $statutories);

      foreach($statutories as $statutory){

        // dd( $statutory->organization_id);

        DB::table('employee_statutories')->insert([
                'employee_id' => $lastEmployeeId,
                'statutory_id' => $statutory->id, 
                'employee_statutory_no' => '', 
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

        $allowances = DB::table('allowances')

        ->select(

          'employee_id',

          'allowance_type_id', 

          DB::raw('SUM(amount) as allowance_amount'))

          ->where('allowances.company_id', $company->id)

          ->where('allowances.employee_id', $employee->id)

          ->where('allowances.amount','>', 0)

          ->groupBy('employee_id')

          ->groupBy('allowance_type_id');


        $deductions = DB::table('deductions')

        ->select(

          'deduction_type_id','employee_id',

          DB::raw('SUM(balance) as deduction_amount'))

          ->where('deductions.company_id', $company->id)

           ->where('deductions.employee_id', $employee->id)

           ->where('deductions.balance', '>', 0)

           ->groupBy('employee_id')

          ->groupBy('deduction_type_id');


      $allowance_types = DB::table('allowance_types')

       ->joinSub($allowances, 'allowances', function($join) {

        $join->on('allowance_types.id','allowances.allowance_type_id');

      })

      ->select(

        'allowances.*',

       
        'allowance_types.name as allowance_name'

      )->get();

      $deduction_types = DB::table('deduction_types')

       ->joinSub($deductions, 'deductions', function($join) {

        $join->on('deduction_types.id','deductions.deduction_type_id');

      })

      ->select(

        'deductions.*',

       
        'deduction_types.description as deduction_name'

      )->get();


  


      $employee = DB::table('employees')

      ->where('employees.id', $employee->id)

      ->join('users', 'users.id','employees.user_id')

      ->join('salaries','employees.id', 'salaries.employee_id')

      ->join('centers', 'employees.center_id', '=', 'centers.id')

       ->join('departments', 'employees.department_id', 'departments.id')

      ->join('banks', 'employees.bank_id', 'banks.id')

      ->join('designations', 'employees.designation_id','designations.id')

      ->join('scales', 'designations.scale_id','scales.id')

      ->join('levels', 'designations.level_id','levels.id')

      ->join('employment_types', 'scales.employment_type_id','employment_types.id')

      ->join('payroll_groups', 'scales.payroll_group_id','payroll_groups.id')

      ->join('pay_bases', 'scales.pay_base_id','pay_bases.id')
     

        ->select(

          'users.*',

          'employees.*',

          'salaries.amount as salary',

          
          'centers.name as center_name',

          'departments.name as department_name',

          'banks.name as bank_name',

          'scales.name as scale_name',

          'employment_types.name as employment_type_name',

          'pay_bases.name as pay_base_name',

          'payroll_groups.name as payroll_group_name',

          'scales.description as scale_description',

          'levels.description as level_description',

          'designations.name as designation_name',

          'designations.description as designation_description',

          'centers.description as center_description'

          )


          ->first();


        $kins = DB::table('kin')

        ->where('kin.company_id', $company->id)

        ->where('employee_id',$employee->id)

        ->join('employees','employees.id','kin.employee_id')

      



        ->join('kin_types','kin_types.id','kin.kin_type_id')

        ->select(

          'employees.*',         

          'kin.*',

          'kin_types.name as kin_type_name'

          )

        ->get();

        $statutories = DB::table('employee_statutories')

        ->where('employee_statutories.company_id', $company->id)

        ->where('employee_statutories.employee_id', $employee->id)

        ->join('statutories', 'statutories.id','employee_statutories.statutory_id')


        ->join('organizations', 'organizations.id','statutories.organization_id')

        ->join('salary_bases','salary_bases.id', 'statutories.base_id')

        ->join('statutory_types', 'statutory_types.id', '=', 'statutories.statutory_type_id')

        ->select(

             'employee_statutories.*',

          'statutories.*',

          'organizations.name as organization_name',

          'salary_bases.name as salary_base',

          'statutory_types.name as statutory_type_name',

          'employee_statutories.id as employee_statutory_id'

          )

        ->get();



        






  



        return view('employees.show',compact('employee','allowance_types','deduction_types','kins','statutories'));

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

        // 'payroll_group_id' =>'required|string',

        'center_id' => 'required|string',

      ]);




      DB::transaction( function() {

     

        DB::table('employees')


        ->where('id', request('employee_id'))->update([

          // 'payroll_group_id' => request('payroll_group_id'),

          'center_id' => request('center_id'),

          'department_id' => request('department_id'),

          'designation_id'=> request('designation_id'),       

          
          'bank_id' => request('bank_id'),

          'account_number' => request('account_number'),

          'updated_at' =>now(),






        ]);

        DB::table('salaries')

        ->where('employee_id', request('employee_id'))->update([
          'amount' => request('salary'),
          'updated_at' => now(),
        ]);


            

              


        });

      return redirect('employees')

              ->with('success','Employee updated successfully');

      


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


            DB::table('employee_statutories')
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
