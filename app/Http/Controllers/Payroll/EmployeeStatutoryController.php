<?php

namespace BrainySoft\Http\Controllers\Payroll;



use Illuminate\Support\Facades\DB;

use Exception;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Company;

use BrainySoft\Payroll\Statutory;

use BrainySoft\Payroll\Employee;

use BrainySoft\Payroll\Salary_base;

use BrainySoft\Payroll\Organization;

use Illuminate\Http\Request;

use BrainySoft\Payroll\Statutory_type;

use Illuminate\Support\Facades\Log;

use BrainySoft\Payroll\EmployeeStatutory;

use BrainySoft\Http\Controllers\Controller;






class EmployeeStatutoryController extends Controller
{
    
    public function __construct()
    {

       // $this->middleware('auth');
        $this->middleware('role');

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
    public function index(Request $request)
    {
        
        $company = $this->company(); 

        $employee = Employee::find(request('employee_id'));     

        $statutories = DB::table('employee_statutories')

        ->where('employee_statutories.company_id', $company->id)

        ->where('employee_statutories.employee_id', request('employee_id'))

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

        return view('employee_statutories.index', compact('statutories','employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = $this->company();       

        $statutories = Statutory::where(

        'statutories.company_id', $company->id)
     

        ->where('statutories.selection', 1)

         ->select(

          'statutories.*'

          )

         ->get();

     

         return view('employee_statutories.create', compact( 'statutories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
            $company = $this->company();

            $statutoryExists = EmployeeStatutory::where('employee_id', request('employee_id'))
            ->where('company_id', $company->id)

            ->where('statutory_id', request('statutory_id'))

            ->exists();

            if($statutoryExists){

            return back()->with('error','Statutory already exist for this employee');

            
            }else {

            $employee_statutory = new EmployeeStatutory;

            $employee_statutory->employee_id = request('employee_id');

            $employee_statutory->statutory_id = request('statutory_id');

            $employee_statutory->employee_statutory_no = request('employee_statutory_no');

            $employee_statutory->company_id = $company->id;

            $employee_statutory->save();

            return back()->with('success','Bank added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeStatutory $employee_statutory)
    {
      $employee_statutory_id = $employee_statutory->id;
      $employee_statutory = EmployeeStatutory::find($employee_statutory_id);
      $employee_statutory_no = $employee_statutory->employee_statutory_no;
      return view('employee_statutories.edit', compact('employee_statutory_id', 'employee_statutory_no'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeStatutory $employee_statutory)
    {
      $employee_statutory_id = $employee_statutory->id;

  
      $employee_id = $employee_statutory->employee_id;

     

   
      $employeeStatutoryUpdate = EmployeeStatutory::where('id', $employee_statutory_id)     

      ->update([

          'employee_statutory_no'			=>$request->input('employee_statutory_no'),
        

      ]);

      if($employeeStatutoryUpdate)

       // return redirect('employee_statutories', ['employee_id' =>  $employee_id ])

        return redirect()->route('employee_statutories.index',['employee_id' => $employee_id])

        ->with('success','Employee statutories updated successfully');
        //redirect
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeStatutory $employee_statutory)
    {

                   
     $employee_statutory = EmployeeStatutory::find($employee_statutory->id);

      if ($employee_statutory->delete()){

        return back()

        ->with('success','employee statutory deleted successfully');

      }else{

        return back()->with('error','employee statutory could not be deleted');

      }
    }
}
