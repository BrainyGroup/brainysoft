<?php

namespace BrainySoft\Http\Controllers\Payroll;

use Exception;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Role;

use BrainySoft\Payroll\Company;

use BrainySoft\Payroll\Employee;

use BrainySoft\Payroll\Organization;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use BrainySoft\Http\Controllers\Controller;

class RoleController extends Controller
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

          Log::debug($company->name.': Start role index');

          // $employee = Employee::find(auth()->user()->id);

          $roles = Role::all();

          return view('roles.index', compact('roles'));

         

        }catch(Exception $e){

          $company = $this->company();

          Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          Log::debug($company->name.': End role index');

          //return false;
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('roles.create');

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

      //get user id

      $company = $this->company();

      $role = new Role;

      $role->name = request('name');

      $role->description = request('description');     

      $role->company_id = $company->id;

      $role->save();

      return back()->with('success','Role added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
      //Validation
      
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      $roleUpdate = Role::where('id', $role->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

      ]);

      if($roleUpdate)

        return redirect('roles')

        ->with('success','Role updated successfully');
        //redirect
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
      $role_employee_exist = Employee::where('role_id',$role->id)->exists();

      $role_organization_exist = Organization::where('role_id',$role->id)->exists();

      $role = Role::find($role->id);

      if (!$role_employee_exist && !$role_employee_exist && $role->delete()){

        return redirect('roles')

        ->with('success','Role deleted successfully');

      }else{

        return back()->with('error','Role could not be deleted');

      }
    }
}
