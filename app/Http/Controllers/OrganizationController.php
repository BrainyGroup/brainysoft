<?php

namespace App\Http\Controllers;

use App\Organization;

use Illuminate\Http\Request;

use App\Company;

use App\Employee;

use App\Bank;

use App\Statutory_type;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $employee = Employee::find(auth()->user()->id);

          $organizations = Organization::where('organizations.company_id', $employee->company_id)

          ->join('banks', 'banks.id', 'organizations.bank_id')

          ->join('statutory_types', 'statutory_types.id', 'organizations.statutory_type_id')

          ->select(

            'organizations.*',

            'statutory_types.name as statutory_name',

            'banks.name as bank_name'

            )

          ->get();

          return view('organizations.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::all();

        $statutory_types = Statutory_type::all();

        return view('organizations.create', compact('banks', 'statutory_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $employee = Employee::find(auth()->user()->id);

      $organization = new Organization;

      $organization->name = request('name');

      $organization->description = request('description');

      $organization->statutory_type_id = request('statutory_type_id');

      $organization->bank_id = request('bank_id');

      $organization->account_number = request('account_number');

      $organization->company_id = $employee->company_id;

      $organization->save();

      return redirect('organizations');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        //
    }
}
