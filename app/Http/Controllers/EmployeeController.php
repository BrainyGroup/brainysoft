<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Company;

use App\Employee;



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $employee = Employee::find(auth()->user()->id);

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
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //update statutory table

      $statutories = Statutory::find($company_id);

      foreach($statutories as $statutory){

          $employee->statutories()->attach($statutory->id, ['company_id' => $company_id]);

      }






        //
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
