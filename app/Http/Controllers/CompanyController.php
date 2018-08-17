<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Country;

use App\Company;

use App\employee;


class CompanyController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $country = Country::find(1);

      $companies = Company::where('country_id', $country->id)->get();

      return view('companies.index', compact('companies'));

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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
