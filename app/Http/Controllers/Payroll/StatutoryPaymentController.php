<?php

namespace BrainySoft\Http\Controllers;

use Illuminate\Support\Facades\DB;
use BrainySoft\User;
use BrainySoft\Company;
use BrainySoft\Statutory;
use Illuminate\Http\Request;
use BrainySoft\Http\Controllers\Controller;

class StatutoryPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function company()
    {
      $user = User::find(auth()->user()->id);

      return Company::find($user->company_id);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $company = $this->company();

        $company_id = $company->id;

        $statutory_balance = request('statutory_balance');

        $statutory_id = request('statutory_id');

        $max_pay = request('max_pay');

        if($statutory_id == 9999){
            $statutory_name = "PAYE";
        }else{
            $statutory_name = Statutory::where('id',$statutory_id)->value('name');
        }


        return view('statutory_payments.create',compact('statutory_balance','statutory_id','max_pay','statutory_name'));
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
              DB::transaction(function () {
      $this->validate(request(),[

        'paid' =>'required|string', 

      ]);

      

      $company = $this->company();

      DB::table('statutory_payment_history')->insert([
        'company_id' => $company->id,      
        'pay_number' => request('pay_number'),
        'statutory_id' =>  request('statutory_id'),
        'amount' =>   request('paid'),
        'month' =>   '02', 
        'year'  =>  '2020',
        "pay_date" => now(),               
        'created_at' =>now(),
        'updated_at' =>now(),
    ]);

    $balance_new = request('balance') - request('paid');


    DB::table('statutory_payments')              
    ->where('company_id', $company->id)
    ->where('pay_number', request('pay_number'))   
    ->where('statutory_id', request('statutory_id'))             

    ->update([
              'balance' => $balance_new,
              'updated_at' => now()]);
      });

      //return back()->with('success','Kin added successfully');


      //return redirect()->route('pays');

      return redirect('pays');
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
