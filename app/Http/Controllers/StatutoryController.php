<?php

namespace BrainySoft\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Company;

use BrainySoft\Statutory;

use BrainySoft\Employee;

use BrainySoft\Organization;

use BrainySoft\Statutory_type;

use BrainySoft\Salary_base;

use DB;

class StatutoryController extends Controller
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

        Log::debug($company->name.': Start statutory index');

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

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End statutory index');

      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $organizations = Organization::all();

        $salary_bases = Salary_base::all();

        $statutory_types = Statutory_type::all();

        return view('statutories.create', compact('organizations', 'salary_bases', 'statutory_types'));

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

        'organization_id' =>'required|numeric',

        'statutory_type_id' => 'required|numeric',

        'salary_base_id' =>'required|numeric',

        'employee_ratio' => 'required|numeric',

        'employer_ratio' =>'required|numeric',

        'due_date' =>'required|date',

      ]);

      $employee = Employee::find(auth()->user()->id);

      $statutory = new Statutory;

      $statutory->name = request('name');

      $statutory->description = request('description');

      $statutory->organization_id = request('organization_id');

      $statutory->statutory_type_id = request('statutory_type_id');

      $statutory->base_id = request('salary_base_id');

      $statutory->employee = request('employee_ratio');

      $statutory->employer = request('employer_ratio');

      $statutory->date_required = request('due_date');

      $statutory->total = $statutory->employee + $statutory->employer;

      $statutory->company_id = $employee->company_id;

      $statutory->save();

      return redirect('statutories');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Statutory $statutory)
    {
        return view('statutories.show',compact('statutory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('statutories.edit');
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
