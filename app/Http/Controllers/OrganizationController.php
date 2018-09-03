<?php

namespace BrainySoft\Http\Controllers;

use BrainySoft\Organization;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Company;

use BrainySoft\Employee;

use BrainySoft\Bank;

use BrainySoft\Statutory_type;

class OrganizationController extends Controller
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

        Log::debug($company->name.': Start organization index');

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

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End organizations index');

      }

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

      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

        'statutory_type_id' =>'required|numeric',

        'bank_id' => 'required|numeric',

        'account_number' =>'required|numeric',

      ]);


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
     * @param  \BrainySoft\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        return view('organizations.show',compact('organization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        return view('organizations.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
      $organization = Organization::find($organization->id);

      if ($organization->delete()){

        return redirect('organizations.index')

        ->with('success','Organization deleted successfully');

      }else{

        return back()->withInput()->with('error','Organization could not be deleted');

      }
    }
}
