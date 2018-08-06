<?php

namespace App\Http\Controllers;

use App\Salary_base;

use Illuminate\Http\Request;

use App\Company;

use App\Employee;

class SalaryBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $employee = Employee::find(auth()->user()->id);

          $salary_bases = Salary_base::where('company_id', $employee->company_id)->get();

          return view('salary_bases.index', compact('salary_bases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salary_bases.create');
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

      $salary_base = new Salary_base;

      $salary_base->name = request('name');

      $salary_base->description = request('description');

      $salary_base->company_id = $employee->company_id;

      $salary_base->save();

      return redirect('salary_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salary_base  $salary_base
     * @return \Illuminate\Http\Response
     */
    public function show(Salary_base $salary_base)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salary_base  $salary_base
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary_base $salary_base)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salary_base  $salary_base
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary_base $salary_base)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salary_base  $salary_base
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary_base $salary_base)
    {
        //
    }
}
