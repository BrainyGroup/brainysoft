<?php

namespace BrainySoft\Http\Controllers;

use BrainySoft\Kin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Company;

use BrainySoft\Employee;

// TODO: create kin seeder


class KinController extends Controller
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

        Log::debug($company->name.': Start kin index');

        $employee = Employee::find(auth()->user()->id);

        $kins = Kin::where('company_id', $employee->company_id)->get();

        return view('kins.index', compact('kins'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End kin index');

      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('kins.create');

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

        'kin_type_id' =>'required|numeric',

        'employee_id' => 'required|numeric',

      ]);

      $employee = Employee::find(auth()->user()->id);

      $kin = new Kin;

      $kin->name = request('name');

      $kin->description = request('description');

      $kin->description = request('kin_type_id');

      $kin->description = request('employee_id');

      $kin->company_id = $employee->company_id;

      $kin->save();

      return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function show(Kin $kin)
    {
        return view('kins.show',compact('kin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function edit(Kin $kin)
    {
        return view('kins.edit',compact('kin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kin $kin)
    {
      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

        'kin_type_id' =>'required|numeric',

        'employee_id' => 'required|numeric',

      ]);

      $kinUpdate = Kin::where('id', $kin->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

          'kin_type_id'			=>$request->input('kin_type_id'),

          'employee_id'	=>$request->input('employee_id'),



      ]);

      if($kinUpdate)

        return redirect('kins')

        ->with('success','Kin updated successfully');
        //redirect
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kin $kin)
    {
      $kin = Kin::find($kin->id);

      if ($kin->delete()){

        return redirect('kins')

        ->with('success','Kin deleted successfully');

      }else{

        return back()->withInput()->with('error','Kin could not be deleted');

      }
    }
}
