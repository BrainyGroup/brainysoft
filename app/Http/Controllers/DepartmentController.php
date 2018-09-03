<?php

namespace BrainySoft\Http\Controllers;

use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

use BrainySoft\Department;

use BrainySoft\Employee;

use BrainySoft\Company;

use Exception;


class DepartmentController extends Controller
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

        Log::debug($company->name.': Start department index');

        $employee = Employee::find(auth()->user()->id);

        $departments = Department::where('company_id', $employee->company_id)->get();

        return view('departments.index', compact('departments'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End department index');

      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('departments.create');

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

      $department = new Department;

      $department->name = request('name');

      $department->description = request('description');

      $department->company_id = $employee->company_id;

      $department->save();

      return redirect('departments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('departments.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('departments.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
      $department = Department::find($department->id);

      if ($department->delete()){

        return redirect('departments.index')

        ->with('success','Department deleted successfully');

      }else{

        return back()->withInput()->with('error','Department could not be deleted');

      }
    }
}
