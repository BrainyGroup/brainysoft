<?php

namespace BrainySoft\Http\Controllers;

use BrainySoft\User;

use BrainySoft\Company;

use BrainySoft\Pay_base;

use Illuminate\Http\Request;

class PayBaseController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

      $pay_base = new Pay_base;

      $pay_base->name = request('name');

      $pay_base->description = request('description');

      $pay_base->company_id = $company->id;

      $pay_base->save();

      return back()->with('success','Pay type added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Pay_base  $pay_base
     * @return \Illuminate\Http\Response
     */
    public function show(Pay_base $pay_base)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Pay_base  $pay_base
     * @return \Illuminate\Http\Response
     */
    public function edit(Pay_base $pay_base)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Pay_base  $pay_base
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pay_base $pay_base)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Pay_base  $pay_base
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay_base $pay_base)
    {
        //
    }
}
