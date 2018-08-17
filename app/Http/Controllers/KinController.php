<?php

namespace App\Http\Controllers;

use App\Kin;
use Illuminate\Http\Request;

use App\Company;


class KinController extends Controller
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

          $kins = Kin::where('company_id', $company->id)->get();

          return view('kins.index', compact('kins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('kins.create');

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

        'kin_type_id' =>'required|numeric',

        'employee_id' => 'required|numeric',

      ]);

      $employee = Employee::find(auth()->user()->id);

      $kin = new Kin;

      $kin->name = request('name');

      $kin->description = request('description');

      $kin->description = request('kin_type_id');

      $kin->description = request('employee_id');

      $kin->company_id = $employee->company_id;

      $kin->save();

      return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function show(Kin $kin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function edit(Kin $kin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kin $kin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kin $kin)
    {
        //
    }
}
