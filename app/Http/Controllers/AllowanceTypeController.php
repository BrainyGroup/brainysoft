<?php

namespace App\Http\Controllers;

use App\Allowance_type;
use Illuminate\Http\Request;

use App\Company;

use App\Employee;

class AllowanceTypeController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::find(1);

        $allowance_types = Allowance_type::where('company_id', $company->id)->get();

        return view('allowance_types.index', compact('allowance_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('allowance_types.create');

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

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      //get user id

      $id = auth()->user()->id;

      //get employee with that user id

      $employee = Employee::find($id);

      //save records

      $allowance_type = new Allowance_type;

      $allowance_type->name = request('name');

      $allowance_type->description = request('description');

      $allowance_type->company_id = $employee->company_id;

      $allowance_type->save();

      //redirect to allowance types

      return redirect('allowance_types');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Allowance_type  $allowance_type
     * @return \Illuminate\Http\Response
     */
    public function show(Allowance_type $allowance_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Allowance_type  $allowance_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Allowance_type $allowance_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Allowance_type  $allowance_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allowance_type $allowance_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Allowance_type  $allowance_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allowance_type $allowance_type)
    {
        //
    }
}
