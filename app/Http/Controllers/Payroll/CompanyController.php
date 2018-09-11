<?php

namespace BrainySoft\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Country;

use BrainySoft\Company;

use BrainySoft\Employee;


class CompanyController extends Controller
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

        Log::debug($company->name.': Start company index');

        // TODO: figure out how to get country



        $companies = Company::all();

        return view('companies.index', compact('companies'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End company index');
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

        return view('companies.create', compact('countries'));

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

      $employee = Employee::find(auth()->user()->id);

      $company = new Company;

      $company->name = request('name');

      $company->description = request('description');

      $company->logo = request('logo');

      $company->website = request('website');

      $company->tin = request('tin');

      $company->vrn = request('vrn');

      $company->regno = request('regno');

      $company->slogan = request('slogan');

      $company->mission = request('mission');

      $company->vision = request('vision');

      $company->country_id = request('country_id');

      $company->save();

      return redirect('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $countries = Country::all();

        $current_country = Country::find($company->country_id);

        return view('companies.edit', compact('company','countries','current_country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      $companyUpdate = Company::where('id', $company->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

          'logo'			=>$request->input('website'),

          'website'	=>$request->input('website'),

          'country_id'	=>$request->input('country_id'),

          'tin'			=>$request->input('tin'),

          'vrn'	=>$request->input('vrn'),

          'regno'			=>$request->input('regno'),

          'slogan'	=>$request->input('slogan'),

          'mission'			=>$request->input('mission'),

          'vision'	=>$request->input('vision'),

      ]);

      if($companyUpdate)

        return redirect('companies')

        ->with('success','Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
      $company = Company::find($company->id);

      if ($company->delete()){

        return redirect('companies')

        ->with('success','Company deleted successfully');

      }else{

        return back()->withInput()->with('error','Company could not be deleted');

      }
    }
}
