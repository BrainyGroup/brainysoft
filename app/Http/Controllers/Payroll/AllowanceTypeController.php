<?php

namespace BrainySoft\Http\Controllers;


use Exception;

use BrainySoft\User;

use BrainySoft\Company;

use BrainySoft\Employee;

use Illuminate\Http\Request;

use BrainySoft\Allowance_type;

use BrainySoft\Allowance;

use Illuminate\Support\Facades\Log;


class AllowanceTypeController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

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

        Log::debug($company->name.': Start allowance index');

        //$employee = Employee::find(auth()->user()->id);

        $allowance_types = Allowance_type::all();

        return view('allowance_types.index', compact('allowance_types'));

      }catch(Exception $e){

          $company = $this->company();

          Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          Log::debug($company->name.': End allowance types index');
      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('allowance_types.create');

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
      //save records

      $allowance_type = new Allowance_type;

      $allowance_type->name = request('name');

      $allowance_type->description = request('description');

      $allowance_type->company_id = $company->id;

      $allowance_type->save();

      //redirect to allowance types     

      return back()->with('success','Allowance type added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Allowance_type  $allowance_type
     * @return \Illuminate\Http\Response
     */
    public function show(Allowance_type $allowance_type)
    {
        return view('allowance_types.show',compact('allowance_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Allowance_type  $allowance_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Allowance_type $allowance_type)
    {
        return view('allowance_types.edit', compact('allowance_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Allowance_type  $allowance_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allowance_type $allowance_type)
    {
      $allowanceTypeUpdate = Allowance_type::where('id', $allowance_type->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

      ]);

      if($allowanceTypeUpdate)

        return redirect('allowance_types')

        ->with('success','Allowance type updated successfully');
        //redirect
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Allowance_type  $allowance_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allowance_type $allowance_type)
    {

      $allowance_types_exist = Allowance::where('allowance_type_id',$allowance_type->id)->exists();

      if (!$allowance_types_exist && $allowance_type->delete()){

        return redirect('allowance_types')

        ->with('success','Allowance type deleted successfully');

      }else{

        return back()->withInput()->with('error','Allowance type could not be deleted');

      }
    }
}
