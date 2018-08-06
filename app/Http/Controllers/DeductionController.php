<?php

namespace App\Http\Controllers;

use App\Deduction;

use Illuminate\Http\Request;

use App\Company;

use App\Employee;

use App\User;

use App\Deduction_type;

use DB;

class DeductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

              ->orderBy('employee_id')

              ->get();

            return view('deductions.index', compact('employees_deductions'));
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
     * @param  \App\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function show(deduction $deduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function edit(deduction $deduction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, deduction $deduction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(deduction $deduction)
    {
        //
    }
}
