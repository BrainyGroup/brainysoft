<?php

namespace BrainySoft\Http\Controllers\Payroll;

use Exception;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Bank;

use BrainySoft\Payroll\Company;

use BrainySoft\Payroll\Employee;

use BrainySoft\Payroll\Organization;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use BrainySoft\Http\Controllers\Controller;



class BankController extends Controller
{
    public function __construct()
    {

         $this->middleware('permission:bank-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:bank-create', ['only' => ['create','store']]);
         $this->middleware('permission:bank-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:bank-delete', ['only' => ['destroy']]);

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

          Log::debug($company->name.': Start bank index');

          // $employee = Employee::find(auth()->user()->id);

          $banks = Bank::where('country_id', $company->id)->get();

          return view('banks.index', compact('banks'));

         

        }catch(Exception $e){

          $company = $this->company();

          Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          Log::debug($company->name.': End bank index');

          //return false;
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('banks.create');

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

      $company = $this->company();

      $bank = new Bank;

      $bank->name = request('name');

      $bank->description = request('description');

      $bank->country_id = $company->country_id;

      $bank->company_id = $company->id;

      $bank->save();

      return back()->with('success','Bank added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        return view('banks.show',compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('banks.edit',compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
      //Validation
     
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      $bankUpdate = Bank::where('id', $bank->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

      ]);

      if($bankUpdate)

        return redirect('banks')

        ->with('success','Bank updated successfully');
        //redirect
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
      $bank_employee_exist = Employee::where('bank_id',$bank->id)->exists();

      $bank_organization_exist = Organization::where('bank_id',$bank->id)->exists();

      $bank = Bank::find($bank->id);

      if (!$bank_employee_exist && !$bank_employee_exist && $bank->delete()){

        return redirect('banks')

        ->with('success','Bank deleted successfully');

      }else{

        return back()->with('error','Bank could not be deleted');

      }
    }
}
