<?php

namespace App\Http\Controllers;

use App\Statutory_type;
use Illuminate\Http\Request;

use App\Company;

class StatutoryTypeController extends Controller
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

          $statutory_types = Statutory_type::where('company_id', $company->id)->get();

          return view('statutory_types.index', compact('statutory_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('statutory_types.create');
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

      $employee = Employee::find(auth()->user()->id);

      $statutory_type = new Statutory_type;

      $statutory_type->name = request('name');

      $statutory_type->description = request('description');

      $statutory_type->company_id = $employee->company_id;

      $statutory_type->save();

      return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statutory_type  $statutory_type
     * @return \Illuminate\Http\Response
     */
    public function show(Statutory_type $statutory_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statutory_type  $statutory_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Statutory_type $statutory_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statutory_type  $statutory_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statutory_type $statutory_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statutory_type  $statutory_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statutory_type $statutory_type)
    {
        //
    }
}
