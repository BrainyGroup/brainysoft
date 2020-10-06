<?php

namespace BrainySoft\Http\Controllers\Payroll;



use Exception;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Level;

use BrainySoft\Payroll\Scale;

use BrainySoft\Payroll\Company;

use BrainySoft\Payroll\Employee;

use BrainySoft\Payroll\Designation;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use BrainySoft\Http\Controllers\Controller;



class DesignationController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        //$this->middleware('role');

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

        Log::debug($company->name.': Start designation index');

        //$employee = Employee::where('user_id', auth()->user()->id)->first();

        $designations = Designation::where('company_id', $company->id)->get();

        return view('designations.index', compact('designations'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End designation index');

      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         $company = $this->company();

        $levels = Level::all();

         $scales = Scale::where('company_id', $company->id)->get();

        return view('designations.create', compact(
          'levels',
          'scales'
        ));

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

      $designation = new Designation;

      $designation->name = request('name');

      $designation->description = request('description');

       $designation->level_id = request('level_id');


        $designation->scale_id = request('scale_id');

      $designation->company_id = $company->id;

      $designation->save();

     return back()->with('success','Designation added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        return view('designations.show',compact('designation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(Designation $designation)
    {
        return view('designations.edit', compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designation $designation)
    {
      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      $designationUpdate = Designation::where('id', $designation->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

          'level_id'  =>$request->input('level_id'),

          'scale_id' =>$request->input('scale_id'),

      ]);

      if($designationUpdate)

        return redirect('designations')

        ->with('success','Designation updated successfully');
        //redirect


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {

        $designation_exist = Employee::where('designation_id',$designation->id)->exists();

        if (!$designation_exist && $designation->delete()){

        return redirect('designations')

        ->with('success','Designation deleted successfully');

      }else{

        return back()->withInput()->with('error','Designation could not be deleted');

      }
    }
}
