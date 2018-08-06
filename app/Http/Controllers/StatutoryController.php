<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

use App\Statutory;

use DB;

class StatutoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $employee = Employee::find(auth()->user()->id);


          $statutories = DB::table('statutories')

          ->where('statutories.company_id', $employee->company_id)

          ->join('organizations', 'organizations.id','statutories.organization_id')

          ->join('salary_bases','salary_bases.id', 'statutories.base_id')

          ->join('statutory_types', 'statutory_types.id', '=', 'statutories.statutory_type_id')

          ->select(

            'statutories.*',

            'organizations.name as organization_name',

            'salary_bases.name as salary_base',

            'statutory_types.name as statutory_type_name'

            )

          ->get();

          return view('statutories.index', compact('statutories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('statutories.create');

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

      $statutory = new Statutory;

      $statutory->name = request('name');

      $statutory->description = request('description');

      $statutory->organization_id = request('organization_id');

      $statutory->employee = request('employee');

      $statutory->employer = request('employer');

      $statutory->total = $statutory->employee + $statutory->employer;

      $statutory->company_id = $employee->company_id;

      $statutory->save();

      return back();

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
