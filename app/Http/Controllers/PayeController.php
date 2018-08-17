<?php

namespace App\Http\Controllers;

use App\Paye;
use Illuminate\Http\Request;

use App\Country;

class PayeController extends Controller
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

          $payes = Paye::where('country_id', $country->id)->get();

          return view('payes.index', compact('payes'));
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
     * @param  \App\Paye  $paye
     * @return \Illuminate\Http\Response
     */
    public function show(Paye $paye)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paye  $paye
     * @return \Illuminate\Http\Response
     */
    public function edit(Paye $paye)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paye  $paye
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paye $paye)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paye  $paye
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paye $paye)
    {
        //
    }
}
