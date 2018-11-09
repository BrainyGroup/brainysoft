<?php

namespace BrainySoft\Http\Controllers;

use Exception;

use BrainySoft\User;

use BrainySoft\Bank;

use BrainySoft\Company;

use BrainySoft\Employee;

use BrainySoft\Organization;

use Illuminate\Http\Request;

use BrainySoft\Statutory_type;

use Illuminate\Support\Facades\Log;



class OrganizationController extends Controller
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

        Log::debug($company->name.': Start organization index');      

        $organizations = Organization::where('organizations.country_id', $company->country_id)

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

        $company = $this->company();
        
        $banks = Bank::where('country_id', $company->country_id)->get();

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


      $company = $this->company();

      $organization = new Organization;

      $organization->name = request('name');

      $organization->description = request('description');

      $organization->statutory_type_id = request('statutory_type_id');

      $organization->bank_id = request('bank_id');

      $organization->account_number = request('account_number');

      $organization->company_id = $company->id;

      $organization->country_id = $company->country_id;

      $organization->save();

      return back()->with('success','Organization added successfully');

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

        $company = $this->company();

        $banks = Bank::where('country_id', $company->country_id)->get();

        $statutory_types = Statutory_type::all();

        $current_statutory_type = Statutory_type::find($organization->statutory_type_id);

        $current_bank = Bank::find($organization->bank_id);

        return view('organizations.edit',compact('organization', 'banks','current_bank', 'statutory_types','current_statutory_type'));

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
      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

        'statutory_type_id' =>'required|numeric',

        'bank_id' => 'required|numeric',

        'account_number' =>'required|numeric',

      ]);

      $organizationUpdate = Organization::where('id', $organization->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

          'statutory_type_id'			=>$request->input('statutory_type_id'),

          'bank_id'	=>$request->input('bank_id'),

          'account_number'			=>$request->input('account_number'),



      ]);

      if($organizationUpdate)

        return redirect('organizations')

        ->with('success','Organization updated successfully');
        //redirect


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {

       $organization_exist = Employee::where('organization_id',$organization->id)->exists();

        if (!$organization_exist && $organization->delete()){

        return redirect('organizations')

        ->with('success','Organization deleted successfully');

      }else{

        return back()->withInput()->with('error','Organization could not be deleted');

      }
    }
}
