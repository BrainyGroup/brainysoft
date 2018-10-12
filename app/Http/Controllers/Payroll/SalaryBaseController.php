<?php

namespace BrainySoft\Http\Controllers;


use Exception;

use BrainySoft\User;

use BrainySoft\Company;

use BrainySoft\Employee;

use BrainySoft\Statutory;

use BrainySoft\Salary_base;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;



class SalaryBaseController extends Controller
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

        Log::debug($company->name.': Start salary base index');

        

        $salary_bases = Salary_base::where('company_id', $company->id)->get();

        return view('salary_bases.index', compact('salary_bases'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End salary base index');

      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salary_bases.create');
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

      $salary_base = new Salary_base;

      $salary_base->name = request('name');

      $salary_base->description = request('description');

      $salary_base->company_id = $company->id;

      $salary_base->save();

      return back()->with('success','Salary added successfully');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Salary_base  $salary_base
     * @return \Illuminate\Http\Response
     */
    public function show(Salary_base $salary_base)
    {
        return view('salary_bases.show',compact('salary_base'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Salary_base  $salary_base
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary_base $salary_base)
    {
        return view('salary_bases.edit',compact('salary_base'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Salary_base  $salary_base
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary_base $salary_base)
    {
      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      $salaryBaseUpdate = Salary_base::where('id', $salary_base->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

      ]);

      if($salaryBaseUpdate)

        return redirect('salary_bases')

        ->with('success','Salary base updated successfully');
        //redirect


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Salary_base  $salary_base
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary_base $salary_base)
    {

        $salary_base_exist = Statutory::where('base_id',$salary_base->id)->exists();

        if (!$salary_base_exist && $salary_base->delete()){

        return redirect('salary_bases')

        ->with('success','Salary base deleted successfully');

      }else{

        return back()->withInput()->with('error','Salary base could not be deleted');

      }
    }
}
