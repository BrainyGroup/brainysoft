<?php

namespace BrainySoft\Http\Controllers;

use Illuminate\Http\Request;

use BrainySoft\Http\Controllers\Controller;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Bank;

use BrainySoft\Company;

use BrainySoft\Employee;

class BankController extends Controller
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

          Log::debug($company->name.': Start bank index');

          $employee = Employee::find(auth()->user()->id);

          $banks = Bank::where('company_id', $employee->company_id)->get();

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

      $id = auth()->user()->id;

      $employee = Employee::find($id);

      $bank = new Bank;

      $bank->name = request('name');

      $bank->description = request('description');

      $bank->company_id = $employee->company_id;

      $bank->save();

      return redirect('banks');
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
      $bank = Bank::find($bank->id);

      if ($bank->delete()){

        return redirect('banks.index')

        ->with('success','Bank deleted successfully');

      }else{

        return back()->withInput()->with('error','Bank could not be deleted');

      }
    }
}
