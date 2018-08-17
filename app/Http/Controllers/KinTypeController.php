<?php

namespace App\Http\Controllers;

use App\Kin_type;
use Illuminate\Http\Request;

use App\Company;

use App\Employee;


class KinTypeController extends Controller
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
          $employee = Employee::find(auth()->user()->id);

          $kin_types = Kin_type::where('company_id', $employee->company_id)->get();

          return view('kin_types.index', compact('kin_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kin_types.create');
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

      $kin_type = new Kin_type;

      $kin_type->name = request('name');

      $kin_type->description = request('description');

      $kin_type->company_id = $employee->company_id;

      $kin_type->save();

      return redirect('kin_types');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kin_type  $kin_type
     * @return \Illuminate\Http\Response
     */
    public function show(Kin_type $kin_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kin_type  $kin_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Kin_type $kin_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kin_type  $kin_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kin_type $kin_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kin_type  $kin_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kin_type $kin_type)
    {
        //
    }
}
