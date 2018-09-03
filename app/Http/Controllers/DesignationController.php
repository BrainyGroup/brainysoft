<?php

namespace BrainySoft\Http\Controllers;

use BrainySoft\Designation;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Company;

use BrainySoft\Employee;



class DesignationController extends Controller
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

        Log::debug($company->name.': Start designation index');

        $employee = Employee::where('user_id', auth()->user()->id)->first();

        $designations = Designation::where('company_id', $employee->company_id)->get();

        return view('designations.index', compact('designations'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End designation index');

      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('designations.create');

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

      $designation = new Designation;

      $designation->name = request('name');

      $designation->description = request('description');

      $designation->company_id = $employee->company_id;

      $designation->save();

      return redirect('designations');

    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        return view('designations.show',compact('designation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(Designation $designation)
    {
        return view('designations.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designation $designation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {

      $designation = Designation::find($designation->id);

      if ($designation->delete()){

        return redirect('designations.index')

        ->with('success','Designation deleted successfully');

      }else{

        return back()->withInput()->with('error','Designation could not be deleted');

      }
    }
}
