<?php

namespace BrainySoft\Http\Controllers;

use BrainySoft\Salary_base;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Company;

use BrainySoft\Employee;

class SalaryBaseController extends Controller
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

        Log::debug($company->name.': Start salary base index');

        $employee = Employee::find(auth()->user()->id);

        $salary_bases = Salary_base::where('company_id', $employee->company_id)->get();

        return view('salary_bases.index', compact('salary_bases'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End salary base index');

      }


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

      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

        'statutory_type_id' =>'required|numeric',

        'bank_id' => 'required|numeric',

        'account_number' =>'required|numeric',

      ]);

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
     * @param  \BrainySoft\Salary_base  $salary_base
     * @return \Illuminate\Http\Response
     */
    public function show(Salary_base $salary_base)
    {
        return view('salary_bases.show',compact('salary_base'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Salary_base  $salary_base
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary_base $salary_base)
    {
        return view('salary_bases.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Salary_base  $salary_base
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary_base $salary_base)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Salary_base  $salary_base
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary_base $salary_base)
    {
      $salary_base = Salary_base::find($salary_base->id);

      if ($salary_base->delete()){

        return redirect('salary_bases.index')

        ->with('success','Salary base deleted successfully');

      }else{

        return back()->withInput()->with('error','Salary base could not be deleted');

      }
    }
}
