<?php


namespace BrainySoft\Http\Controllers\Payroll;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use BrainySoft\Http\Controllers\Controller;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Company;



class EmployeePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        //$this->middleware('auth');
        $this->middleware('role');

    }
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
        $employee_id = request('employee_id');
        $pay_number = request('pay_number');
        $employee_balance = request('employee_balance');
      
        return view('employee_payments.create', compact('employee_id','pay_number','employee_balance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () {
            $this->validate(request(),[
      
              'paid' =>'required|string', 
      
            ]); 
      
            
      
            $company = $this->company();

            $pay_number = request('pay_number');

            $year = substr($pay_number, 0, 4);


            $month = substr($pay_number, 4, 2);

          
      
            DB::table('employee_payment_history')->insert([
              'company_id' => $company->id,      
              'pay_number' => request('pay_number'),
              'employee_id' =>  request('employee_id'),
              'amount' =>   request('paid'),
              'month' =>   $month, 
              'year'  =>  $year,
              "pay_date" => now(),               
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
      
          $balance_new = request('balance') - request('paid');
      
      
          DB::table('pays')              
          ->where('company_id', $company->id)
          ->where('pay_number', request('pay_number'))   
          ->where('employee_id', request('employee_id'))             
      
          ->update([
                    'net_balance' => $balance_new,
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
