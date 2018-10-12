<?php

namespace BrainySoft\Http\Controllers;


use Exception;

use BrainySoft\User;

use BrainySoft\Company;

use BrainySoft\Employee;

use Illuminate\Http\Request;

use BrainySoft\Deduction_type;

use Illuminate\Support\Facades\Log;



class DeductionTypeController extends Controller
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

        Log::debug($company->name.': Start deduction type index');       

        $deduction_types = Deduction_type::where('company_id', $company->id)->get();

        return view('deduction_types.index', compact('deduction_types'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End deduction type index');

      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('deduction_types.create');

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

      $deduction_type = new Deduction_type;

      $deduction_type->name = request('name');

      $deduction_type->description = request('description');

      $deduction_type->company_id = $company->id;

      $deduction_type->save();

      return back()->with('success','Deduction type added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\deduction_type  $deduction_type
     * @return \Illuminate\Http\Response
     */
    public function show(deduction_type $deduction_type)
    {
        return view('deduction_types.show', compact('deduction_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\deduction_type  $deduction_type
     * @return \Illuminate\Http\Response
     */
    public function edit(deduction_type $deduction_type)
    {
        return view('deduction_types.edit', compact('deduction_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\deduction_type  $deduction_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deduction_type $deduction_type)
    {
      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      $deduction_typeUpdate = Deduction_type::where('id', $deduction_type->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

      ]);

      if($deduction_typeUpdate)

        return redirect('deduction_types')

        ->with('success','Deduction type updated successfully');
        //redirect

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\deduction_type  $deduction_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(deduction_type $deduction_type)
    {

      $deduction_type_exist = Deduction::where('deduction_type_id',$deduction_type->id)->exists();

        if (!$deduction_type_exist && $deduction_type->delete()){

        return redirect('deduction_types')

        ->with('success','Deduction type deleted successfully');

      }else{

        return back()->withInput()->with('error','Deduction type could not be deleted');

      }
    }
}
