<?php

namespace BrainySoft\Http\Controllers;



use Exception;

use BrainySoft\User;

use BrainySoft\Company;

use BrainySoft\Employee;

use BrainySoft\Department;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;



class DepartmentController extends Controller
{
    public function __construct()
    {

        //$this->middleware('auth');
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

        Log::debug($company->name.': Start department index');       

        $departments = Department::where('company_id', $company->id)->get();

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

      $company = $this->company();

      $department = new Department;

      $department->name = request('name');

      $department->description = request('description');

      $department->company_id = $company->id;

      $department->save();

      return back()->with('success','Department added successfully');

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
        return view('departments.edit',compact('department'));
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

      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      $departmentUpdate = Department::where('id', $department->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

      ]);

      if($departmentUpdate)

        return redirect('departments')

        ->with('success','Department updated successfully');
        //redirect
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {

      $department_exist = Employee::where('department_id',$department->id)->exists();

        if (!$department_exist && $department->delete()){

        return redirect('departments')

        ->with('success','Department deleted successfully');

      }else{

        return back()->withInput()->with('error','Department could not be deleted');

      }
    }
}
