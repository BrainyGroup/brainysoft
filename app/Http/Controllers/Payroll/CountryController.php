<?php

namespace BrainySoft\Http\Controllers;

use Exception;

use BrainySoft\Country;

use BrainySoft\Company;

use BrainySoft\Employee;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;


class CountryController extends Controller
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

        Log::debug($company->name.': Start country index');

        $countries = Country::all();

        return view('countries.index', compact('countries'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End country index');

      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('countries.create');

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

        'name' =>'required|string'

      ]);



      $country = new Country;

      $country->name = request('name');

      $country->save();

      return redirect('countries');

    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('countries.show',compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('countries.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {

      //Validation
      $this->validate(request(),[

        'name' =>'required|string'

      ]);


    //save data
            $countryUpdate = Country::where('id', $country->id)

            ->update([

                'name'			=> $request->input('name'),

            ]);

            if($countryUpdate)

              return redirect('countries')

              ->with('success','Country updated successfully');
              //redirect



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
      $country = Country::find($country->id);

      if ($country->delete()){

        return redirect('countries')

        ->with('success','Country deleted successfully');

      }else{

        return back()->withInput()->with('error','Country could not be deleted');

      }
    }
}
