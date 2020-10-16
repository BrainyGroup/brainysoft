<?php

namespace BrainySoft\Http\Controllers\Payroll;


use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Company;

use Illuminate\Http\Request;

use BrainySoft\Payroll\Payroll_group;

use BrainySoft\Http\Controllers\Controller;

class PayrollGroupController extends Controller
{

    public function __construct()
    {

       // $this->middleware('auth');
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

      $payroll_group = new Payroll_group;

      $payroll_group->name = request('name');

      $payroll_group->description = request('description');

      $payroll_group->company_id = $company->id;

      $payroll_group->save();

      return back()->with('success','Payroll group added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\payroll_group  $payroll_group
     * @return \Illuminate\Http\Response
     */
    public function show(payroll_group $payroll_group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\payroll_group  $payroll_group
     * @return \Illuminate\Http\Response
     */
    public function edit(payroll_group $payroll_group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\payroll_group  $payroll_group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payroll_group $payroll_group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\payroll_group  $payroll_group
     * @return \Illuminate\Http\Response
     */
    public function destroy(payroll_group $payroll_group)
    {
        //
    }
}
