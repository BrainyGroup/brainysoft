<?php

namespace BrainySoft\Http\Controllers;

use BrainySoft\Paye;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Country;

class PayeController extends Controller
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

        Log::debug($company->name.': Start paye index');

        // TODO: figure out how to find country of the user
        $country = Country::find(1);

        $payes = Paye::where('country_id', $country->id)->get();

        return view('payes.index', compact('payes'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End paye index');

      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $countries = Country::all();

        return view('payes.create', compact('countries'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // TODO: check more on validatition

      //Validation
      $this->validate(request(),[

        'minimum' =>'required|numeric',

        'maximum' => 'required|numeric',

        'ratio' =>'required|numeric|between:0.001,0.999',

        'offset' => 'required|numeric',

        'country_id' =>'required|numeric',

      ]);


      $paye = new Paye;


      $paye->minimum = request('minimum');

      $paye->maximum = request('maximum');

      $paye->ratio = request('ratio');

      $paye->offset = request('offset');

      $paye->country_id = request('country_id');

      $paye->save();

      return redirect('payes');

    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Paye  $paye
     * @return \Illuminate\Http\Response
     */
    public function show(Paye $paye)
    {
        return view('payes.show',compact('paye'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Paye  $paye
     * @return \Illuminate\Http\Response
     */
    public function edit(Paye $paye)
    {
        return view('paye.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Paye  $paye
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paye $paye)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Paye  $paye
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paye $paye)
    {
      $paye = Paye::find($paye->id);

      if ($paye->delete()){

        return redirect('payes.index')

        ->with('success','Paye deleted successfully');

      }else{

        return back()->withInput()->with('error','Paye could not be deleted');

      }
    }
}
