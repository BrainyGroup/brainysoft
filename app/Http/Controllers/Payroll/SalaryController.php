<?php

namespace BrainySoft\Http\Controllers\Payroll;


use Exception;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Salary;

use BrainySoft\Payroll\Salary_base;

use BrainySoft\Payroll\Company;

use BrainySoft\Payroll\Employee;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use BrainySoft\Http\Controllers\Controller;



class SalaryController extends Controller
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
    public function index()
    {

      // try{

        $company = $this->company();

        Log::debug($company->name.': Start salary index');
        

        $salaries = Salary::where('salaries.company_id', $company->id)

        ->join('employees', 'employees.id', 'salaries.employee_id')

        ->join('users', 'users.id', 'employees.user_id')

        ->get();

        return view('salaries.index', compact('salaries'));

      // }catch(Exception $e){
      //
      //   $company = $this->company();
      //
      //   Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());
      //
      //   Log::debug($company->name.': End salary index');
      //
      // }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('salaries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //Validation
      $this->validate(request(),[

        'employee_id' =>'required|numeric',

        'salary_type_id' => 'required|numeric',

        'salary_amount' =>'required|numeric',

      ]);


      $company = $this->company();

      $salary = new Salary;

      $salary->employee_id = request('employee_id');

      $salary->company_id = $company->id;

      $salary->salary_type_id = request('salary_type_id');

      $salary->amount = request('salary_amount');

      $salary->save();

      return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        return view('salaries.show',compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        return view('salaries.edit',compact('salary'));
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
      //Validation
      $this->validate(request(),[

        'employee_id' =>'required|numeric',

        'salary_type_id' => 'required|numeric',

        'salary_amount' =>'required|numeric',

      ]);

      $salary_baseUpdate = Salary_base::where('id', $salary_base->id)

      ->update([

          'employee_id'			=>$request->input('employee_id'),

          'salary_type_id'	=>$request->input('salary_type_id'),

          'salary_amount'	=>$request->input('salary_amount'),

      ]);

      if($salary_baseUpdate)

        return redirect('salary_bases')

        ->with('success','Salary_base updated successfully');
        //redirect


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {

      
    }
}
