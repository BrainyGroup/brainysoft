<?php

namespace BrainySoft\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\User;

use BrainySoft\Employee;

use BrainySoft\Company;

class UserController extends Controller
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

        Log::debug($company->name.': Start user index');

        $user = User::find(auth()->user()->id);

        $users = User::find($user->company_id)->get();

        $company = Company::find($user->company_id)->first();

        return view('users.index', compact('users','company'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End user index');

      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('users.edit');
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
    public function destroy(User $user)
    {
        // TODO: do not delete user unless does not have any pay and delete cascade

        $user = User::find($user->id);

        if ($user->delete()){

          return redirect('users.index')

          ->with('success','User deleted successfully');

        }else{

          return back()->withInput()->with('error','User could not be deleted');

        }
    }
}
