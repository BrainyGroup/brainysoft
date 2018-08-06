<?php

namespace App\Http\Controllers;

use App\deduction_type;
use Illuminate\Http\Request;

use App\Company;

use App\Employee;

class DeductionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::find(1);

        $deduction_types = Deduction_type::where('company_id', $company->id)->get();

        return view('deduction_types.index', compact('deduction_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('deduction_types.create');

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

      $deduction_type = new Deduction_type;

      $deduction_type->name = request('name');

      $deduction_type->description = request('description');

      $deduction_type->company_id = $employee->company_id;

      $deduction_type->save();

      return redirect('deduction_types');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\deduction_type  $deduction_type
     * @return \Illuminate\Http\Response
     */
    public function show(deduction_type $deduction_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\deduction_type  $deduction_type
     * @return \Illuminate\Http\Response
     */
    public function edit(deduction_type $deduction_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\deduction_type  $deduction_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, deduction_type $deduction_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\deduction_type  $deduction_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(deduction_type $deduction_type)
    {
        //
    }
}
