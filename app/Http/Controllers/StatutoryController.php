<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

use App\Statutory;

use App\Employee;

use App\Organization;

use App\Statutory_type;

use App\Salary_base;

use DB;

class StatutoryController extends Controller
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
