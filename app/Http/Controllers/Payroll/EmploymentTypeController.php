<?php

namespace BrainySoft\Http\Controllers;

use Exception;

use BrainySoft\User;

use BrainySoft\Company;

use Illuminate\Http\Request;

use BrainySoft\Employment_type;

use Illuminate\Support\Facades\Log;




class EmploymentTypeController extends Controller
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

        Log::debug($company->name.': Start employment type index');        

        $employment_types = Employment_type::all();


        return view('employement_types.index');

     

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
        //
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
