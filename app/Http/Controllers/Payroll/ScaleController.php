<?php

namespace BrainySoft\Http\Controllers;


use Exception;

use BrainySoft\User;

use BrainySoft\Scale;

use BrainySoft\Level;

use BrainySoft\Pay_base;

use BrainySoft\Employment_type;

use BrainySoft\Payroll_group;

use BrainySoft\Company;

use BrainySoft\Employee;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;



class ScaleController extends Controller
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

        Log::debug($company->name.': Start scale index');

     

        $scales = Scale::where('company_id', $company->id)->get();

        return view('scales.index', compact('scales'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End scale index');

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

        $payroll_groups = Payroll_group::where('company_id', $company->id)->get();

        $pay_types = Pay_base::all();

        $employment_types = Employment_type::all();

        return view('scales.create', compact(
          'payroll_groups',
          'pay_types',
          'levels',
          'scales',
          'employment_types'

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

      $scale = new Scale;

      $scale->name = request('name');

      $scale->description = request('description');

      $scale->minimum = request('minimum');

      $scale->maximum = request('maximum');

      $scale->pay_base_id = request('pay_base_id');

      $scale->payroll_group_id = request('payroll_group_id');

      $scale->employment_type_id = request('employment_type_id');

      
      // $scale->schedule = request('schedule');

      $scale->company_id = $company->id;

      $scale->save();

     return back()->with('success','Scale added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Scale $scale)
    {
        return view('scales.show',compact('scale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Scale $scale)
    {
        return view('scales.edit',compact('scale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scale $scale)
    {
      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      $scaleUpdate = Scale::where('id', $scale->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

      ]);

      if($scaleUpdate)

        return redirect('scales')

        ->with('success','Scale updated successfully');
        //redirect
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scale $scale)
    {


       $scale_exist = Employee::where('scale_id',$scale->id)->exists();

        if (!$scale_exist && $scale->delete()){

        return redirect('scales')

        ->with('success','Scale deleted successfully');

      }else{

        return back()->withInput()->with('error','Scale could not be deleted');

      }
    }
}
