<?php

namespace BrainySoft\Http\Controllers;

use BrainySoft\deduction_type;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Company;

use BrainySoft\Employee;

class DeductionTypeController extends Controller
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

        Log::debug($company->name.': Start deduction type index');

        $employee = Employee::find(auth()->user()->id);

        $deduction_types = Deduction_type::where('company_id', $employee->company_id)->get();

        return view('deduction_types.index', compact('deduction_types'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End deduction type index');

      }

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

      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

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
     * @param  \BrainySoft\deduction_type  $deduction_type
     * @return \Illuminate\Http\Response
     */
    public function show(deduction_type $deduction_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\deduction_type  $deduction_type
     * @return \Illuminate\Http\Response
     */
    public function edit(deduction_type $deduction_type)
    {
        return view('deduction_types.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\deduction_type  $deduction_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, deduction_type $deduction_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\deduction_type  $deduction_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(deduction_type $deduction_type)
    {
      $deduction = Deduction_type::find($deduction->id);

      if ($deduction->delete()){

        return redirect('deductions.index')

        ->with('success','Deduction type deleted successfully');

      }else{

        return back()->withInput()->with('error','Deduction type could not be deleted');

      }
    }
}
