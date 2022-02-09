<?php

namespace BrainySoft\Http\Controllers\Payroll;

use Exception;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Company;

use Illuminate\Http\Request;

use BrainySoft\Payroll\Employment_type;

use Illuminate\Support\Facades\Log;

use BrainySoft\Http\Controllers\Controller;




class EmploymentTypeController extends Controller
{
   


    public function __construct()
    {

         $this->middleware('permission:employee_type-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:employee_type-create', ['only' => ['create','store']]);
         $this->middleware('permission:employee_type-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:employee_type-delete', ['only' => ['destroy']]);

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

        Log::debug($company->name.': Start employment type index');          
        

        $employment_types = Employment_type::all();

        return view('employment_types.index', compact('employment_types'));     

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End employment type index');

      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('employment_types.create');
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

      $employment_type = new Employment_type;

      $employment_type->name = request('name');

      $employment_type->description = request('description');

      $employment_type->company_id = $company->id;

      $employment_type->save();

      return back()->with('success','Employment type added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Employment_type  $employment_type
     * @return \Illuminate\Http\Response
     */
    public function show(Employment_type $employment_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Employment_type  $employment_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Employment_type $employment_type)
    {
      return view('employment_types.edit',compact('employment_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Employment_type  $employment_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employment_type $employment_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Employment_type  $employment_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employment_type $employment_type)
    {
        //
    }
}
