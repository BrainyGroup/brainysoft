<?php

namespace BrainySoft\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Scale;

use BrainySoft\Company;

use BrainySoft\Employee;

class ScaleController extends Controller
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

        Log::debug($company->name.': Start scale index');

        $employee = Employee::find(auth()->user()->id);

        $scales = Scale::where('company_id', $employee->company_id)->get();

        return view('scales.index', compact('scales'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End scale index');

      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scales.create');
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

      $scale = new Scale;

      $scale->name = request('name');

      $scale->description = request('description');

      $scale->minimum = request('minimum');

      $scale->maximum = request('maximum');

      $scale->schedule = request('schedule');

      $scale->company_id = $employee->company_id;

      $scale->save();

      return redirect('scales');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Scale $scale)
    {
        return view('scales.show',compact('scale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Scale $scale)
    {
        return view('scales.edit');
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
    public function destroy(Scale $scale)
    {
      $scale = Scale::find($scale->id);

      if ($scale->delete()){

        return redirect('scales.index')

        ->with('success','Scale deleted successfully');

      }else{

        return back()->withInput()->with('error','Scale could not be deleted');

      }
    }
}
