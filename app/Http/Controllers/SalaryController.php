<?php

namespace BrainySoft\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Salary;

use BrainySoft\Company;

use BrainySoft\Employee;

class SalaryController extends Controller
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

        Log::debug($company->name.': Start salary index');

        $employee = Employee::find(auth()->user()->id);

        $salaries = Salary::where('salaries.company_id', $employee->company_id)

        ->join('employees', 'employees.id', 'salaries.employee_id')

        ->join('users', 'users.id', 'employees.user_id')

        ->get();

        return view('salaries.index', compact('salaries'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End salary index');

      }

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


      $employee = Employee::find(request('employee_id'));

      $salary = new Salary;

      $salary->employee_id = request('employee_id');

      $salary->company_id = $employee->company_id;

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
        return view('salaries.show',compact('Salary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('salaries.edit');
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
    public function destroy(Salary $salary)
    {
      $salary = Salary::find($salary->id);

      if ($salary->delete()){

        return redirect('Salarys.index')

        ->with('success','Salary deleted successfully');

      }else{

        return back()->withInput()->with('error','Salary could not be deleted');

      }
    }
}
