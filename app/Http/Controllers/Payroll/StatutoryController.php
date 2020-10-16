<?php

namespace BrainySoft\Http\Controllers\Payroll;


use Illuminate\Support\Facades\DB;

use Exception;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Company;

use BrainySoft\Payroll\Statutory;

use BrainySoft\Payroll\Employee;

use BrainySoft\Payroll\Salary_base;

use BrainySoft\Payroll\Organization;

use Illuminate\Http\Request;

use BrainySoft\Payroll\Statutory_type;

use Illuminate\Support\Facades\Log;

use BrainySoft\Http\Controllers\Controller;




class StatutoryController extends Controller
{
  public function __construct()
  {

     // $this->middleware('auth');
      $this->middleware('role');

  }

    private function company()
    {
      $user = User::find(auth()->user()->id);

      return Company::find($user->company_id);
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

        $statutories = DB::table('statutories')

        ->where('statutories.company_id', $company->id)

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

        'selection' => 'required|boolean',

        'mandatory' =>'required|boolean',

        'due_date' =>'required|date',

      ]);

      $company = $this->company();;

      $statutory = new Statutory;

      $statutory->name = request('name');

      $statutory->description = request('description');

      $statutory->organization_id = request('organization_id');

      $statutory->statutory_type_id = request('statutory_type_id');

      $statutory->base_id = request('salary_base_id');

      $statutory->employee = request('employee_ratio');

      $statutory->employer = request('employer_ratio');

      $statutory->before_paye = request('before_paye');

      $statutory->date_required = request('due_date');

      $statutory->selection = request('selection');

      $statutory->mandatory = request('mandatory');

      $statutory->total = $statutory->employee + $statutory->employer;

      $statutory->company_id = $company->id;

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
    public function edit(Statutory $statutory)
    {
        $current_organization = Organization::find($statutory->organization_id);

        $current_salary_base = Salary_base::find($statutory->base_id);

        $current_before_paye = $statutory->before_paye;

        $current_statutory_type = Statutory_type::find($statutory->statutory_type_id);

        $organizations = Organization::all();

        $salary_bases = Salary_base::all();

        $statutory_types = Statutory_type::all();

        return view('statutories.edit',compact(
          'statutory',
          'current_salary_base',
          'current_before_paye',
          'current_organization',
          'current_statutory_type',
          'organizations',
          'salary_bases',
          'statutory_types'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statutory $statutory)
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

      $statutoryUpdate = Statutory::where('id', $statutory->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

          'organization_id'			=>$request->input('organization_id'),

          'statutory_type_id'	=>$request->input('statutory_type_id'),

          'base_id'			=>$request->input('salary_base_id'),

          'employee'	=>$request->input('employee_ratio'),

          'employer'			=>$request->input('employer_ratio'),

          'total' => $request->input('employee_ratio') + $request->input('employer_ratio'),


          'before_paye'			=>$request->input('before_paye'),

          'date_required'	=>$request->input('due_date'),

      ]);

      if($statutoryUpdate)

        return redirect('statutories')

        ->with('success','Statutory updated successfully');
        //redirect


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statutory $statutory)
    {


      if ($statutory->delete()){

        return redirect('statutories')

        ->with('success','Statutory deleted successfully');

      }else{

        return back()->withInput()->with('error','Statutory could not be deleted');

      }
    }
}
