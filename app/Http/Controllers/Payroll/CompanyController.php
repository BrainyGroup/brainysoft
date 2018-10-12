<?php

namespace BrainySoft\Http\Controllers;


use Exception;

use BrainySoft\User;

use BrainySoft\Country;

use BrainySoft\Company;

use BrainySoft\Employee;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;


class CompanyController extends Controller
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

        Log::debug($company->name.': Start company index');

        // TODO: figure out how to get country  



        return view('companies.index', compact('company'));

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

      //$company = $this->company();

      $company = new Company;

      $dt = now();

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

      $company->usage_count  = 0;

      $company->trial_expire_date = now()->addMonth(3);

      $company->last_renew_date  = $dt->toDateString();

      dd($company->last_renew_date);

      $company->employee = request('employee');

      $company->balance  = 0;

      $company->expire_date  = now()->addMonth(3);

      $company->trial  = true;

      $company->country_id = request('country_id');

      $company->save();

      return back()->with('success','Company added successfully');

      // TODO seed initial data with company it, consider languaage add those which not related to the country
      // any country related add when you add country



      /**
      / it is batter to put these information on table based on country for easy update
      / Allowance types
      / banks
      / centers
      / deduction type
      / department
      / designation
      /  statutory base and option and mandatory based on country
      / Kin type consider langauge
      / organization based on country 
      / when you define country define with all item related to the country 
      / paye, organization banks, statutory options and mandatory
      */
      

      
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

          'usage_count'  =>$request->input('0'),

          'trial_expire_date'  => now()->addMonth(3),

          'last_renew_date'  => now(),

          'employee'  =>$request->input('employee'),

          'balance'  => 0,

          'expire_date'  => now()->addMonth(3),

          'trial'  => true,

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




      $company_exist = User::where('company_id',$company->id)->exists();

        if (!$company_exist && $company->delete()){

        return redirect('companies')

        ->with('success','Company deleted successfully');

      }else{

        return back()->withInput()->with('error','Company could not be deleted');

      }
    }
}
