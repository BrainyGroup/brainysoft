<?php

namespace BrainySoft\Http\Controllers;

use BrainySoft\Deduction;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Company;

use BrainySoft\Employee;

use BrainySoft\User;

use BrainySoft\Deduction_type;

use DB;

class DeductionController extends Controller
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

        Log::debug($company->name.': Start deduction index');

        $employee = Employee::find(auth()->user()->id);

        $deduction = DB::table('deductions')

        ->select('employee_id','deduction_type_id',

        DB::raw('SUM(amount) as deduction_amount'))

        ->where('deductions.company_id',1)

        ->groupBy('employee_id')

        ->groupBy('deduction_type_id');


          $employees_deductions=DB::table('employees')

          ->join('users','users.id','employees.user_id')

          ->joinSub($deduction,'deduction', function($join){

            $join->on('employees.id','deduction.employee_id');

          })->join('deduction_types','deduction_types.id','deduction.deduction_type_id')

            ->select(

              'employees.*',

              'users.*',

              'deduction.*',

              'deduction_types.name as deduction_name'

              )

            ->orderBy('employee_id')

            ->get();

          return view('deductions.index', compact('employees_deductions'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End deduction index');

      }


}


public function deductionDetails()
{

  $employee = Employee::find(auth()->user()->id);

  $company = Company::find($employee->company_id);


    $deduction = DB::table('deductions')

    ->select('employee_id','deduction_type_id',

    DB::raw('SUM(amount) as deduction_amount'))

    ->where('deductions.company_id',1)

    ->groupBy('employee_id')

    ->groupBy('deduction_type_id');


      $employees_deductions=DB::table('employees')

      ->join('users','users.id','employees.user_id')

      ->joinSub($deduction,'deduction', function($join){

        $join->on('employees.id','deduction.employee_id');

      })->join('deduction_types','deduction_types.id','deduction.deduction_type_id')

        ->select(

          'employees.*',

          'users.*',

          'deduction.*',

          'deduction_types.name as deduction_name'

          )

          ->orderBy('employees.id', 'asc')

        ->get();

      return view('deductions.deductions', compact('employees_deductions'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $employee = Employee::find(request('employee_id'));

        $user = User::where('users.id', $employee->user_id)->first();

        $deduction_types = Deduction_type::all();

        return view('deductions.create', compact('deduction_types','user'));

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

        'deduction_type_id' => 'required',

        'amount' =>'required|numeric',

        'start_date' => 'required|date',

        'end_date' => 'required|date',

      ]);

      // TODO: check deduction to see if it is working

      $employee = Employee::find(auth()->user()->id);

      $deduction = new Deduction;

      $deduction->amount = request('amount');

      $deduction->start_date = request('start_date');

      $deduction->end_date = request('end_date');

      $deduction->employee_id = request('employee_id');

      $deduction->company_id = $employee->company_id;

      $deduction->deduction_type_id = request('deduction_type_id');

      $deduction->save();

      return redirect('deductions');

    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function show(deduction $deduction)
    {
        return view('deductions.show',compact('deduction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function edit(deduction $deduction)
    {
        return view('deductions.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, deduction $deduction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(deduction $deduction)
    {
      $deduction = Deduction::find($deduction->id);

      if ($deduction->delete()){

        return redirect('deductions.index')

        ->with('success','Deduction deleted successfully');

      }else{

        return back()->withInput()->with('error','Deduction could not be deleted');

      }
    }
}
