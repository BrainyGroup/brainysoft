<?php

namespace BrainySoft\Http\Controllers\Payroll;

use DB;

use Exception;

use Carbon\Carbon;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Company;

use BrainySoft\Payroll\Employee;

use BrainySoft\Payroll\Deduction;

use Illuminate\Http\Request;

use BrainySoft\Payroll\Deduction_type;

use Illuminate\Support\Facades\Log;

use BrainySoft\Http\Controllers\Controller;


class DeductionController extends Controller
{
    public function __construct()
    {

       $this->middleware('auth');
       // $this->middleware('role');

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

        Log::debug($company->name.': Start deduction index');

        $employee = Employee::find(auth()->user()->id);

        // $deduction = DB::table('deductions')
        //
        // ->select('employee_id','deduction_type_id',
        //
        // DB::raw('SUM(amount) as deduction_amount'))
        //
        // ->where('deductions.company_id',1)
        //
        // ->groupBy('employee_id')
        //
        // ->groupBy('deduction_type_id');


          $employees_deductions=DB::table('deductions')

          ->join('employees','employees.id','deductions.employee_id')

          ->join('users','users.id','employees.user_id')

          // ->joinSub($deduction,'deduction', function($join){
          //
          //   $join->on('employees.id','deduction.employee_id');
          //
          // })

          ->join('deduction_types','deduction_types.id','deductions.deduction_type_id')

            ->select(

              'employees.*',

              'users.*',

              'deductions.*',

              'deduction_types.name as deduction_name'

              )

            ->where('deductions.company_id', $company->id )

            //->where('balance','>', 0 )

            //->where('status','!=',0 )            

            ->orderBy('employee_id')

            ->get();

          return view('deductions.index', compact('employees_deductions'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End deduction index');

      }


}


public function deductionDetails()
{

  $employee = Employee::find(auth()->user()->id);

  $company = Company::find($employee->company_id);


    $deduction = DB::table('deductions')

    ->select('employee_id','deduction_type_id',

    DB::raw('SUM(amount) as deduction_amount'))

    ->where('deductions.company_id',1)

    ->groupBy('employee_id')

    ->groupBy('deduction_type_id');


      $employees_deductions=DB::table('employees')

      ->join('users','users.id','employees.user_id')

      ->joinSub($deduction,'deduction', function($join){

        $join->on('employees.id','deduction.employee_id');

      })->join('deduction_types','deduction_types.id','deduction.deduction_type_id')

        ->select(

          'employees.*',

          'users.*',

          'deduction.*',

          'deduction_types.name as deduction_name'

          )

          ->orderBy('employees.id', 'asc')

        ->get();

      return view('deductions.deductions', compact('employees_deductions'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $employee = Employee::find(request('employee_id'));

        $user = User::where('users.id', $employee->user_id)->first();

        $deduction_types = Deduction_type::all();

        return view('deductions.create', compact('deduction_types','user'));

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

        'deduction_type_id' => 'required',

        'amount' =>'required|numeric',

        'start_date' => 'required|date',

        

      ]);

      // TODO: check deduction to see if it is working

     $start_date = new Carbon(request('start_date'));

      $company = $this->company();

      $deduction = new Deduction;

      $deduction->amount = request('amount');

      $deduction->interest = request('interest');

      $deduction->period = request('period');

      $deduction->interest_amount = ($deduction->interest/100) *  $deduction->amount;

      $deduction->total_amount =  $deduction->amount + $deduction->interest_amount;

      $deduction->monthly_amount =  $deduction->total_amount  / $deduction->period;

      $deduction->balance = $deduction->total_amount;

      $deduction->status = 1;

      $deduction->date_taken = request('date_taken');

      $deduction->start_date = request('start_date');

      $deduction->end_date = $start_date->addMonthsNoOverflow($deduction->period);

      $deduction->employee_id = request('employee_id');

      $deduction->company_id = $company->id;

      $deduction->deduction_type_id = request('deduction_type_id');

      $deduction->save();

      return back()->with('success','Deduction added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function show(deduction $deduction)
    {
        return view('deductions.show',compact('deduction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Deduction $deduction)
    {

      $employee = Employee::where('user_id',request('user_id'))->first();


      $user = User::where('users.id', $employee->user_id)->first();

      $deduction_types = Deduction_type::all();



        $current_deduction_type = Deduction_type::find($deduction->deduction_type_id);

        return view('deductions.edit',compact('deduction','deduction_types','current_deduction_type','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deduction $deduction)
    {
      //Validation
      $this->validate(request(),[

        'deduction_type_id' => 'required',

        'amount' =>'required|numeric',

        'start_date' => 'required|date',

      

      ]);

      //save data

  
  $start_date = new Carbon(request('start_date'));

  $deductionUpdate = Deduction::where('id', $deduction->id)

  ->update([


      'deduction_type_id'			=> $request->input('deduction_type_id'),

      'amount'	=> $request->input('amount'),

      'start_date'			=> $request->input('start_date'),

      'end_date' => $start_date->addMonthsNoOverflow($deduction->period),  

      'interest' => $request->input('interest'),

      'period' => request('period'),

      'interest_amount' => ($deduction->interest/100) *  $deduction->amount,

     'total_amount' =>  $deduction->amount + $deduction->interest_amount,

      'monthly_amount' =>  $deduction->total_amount  / $deduction->period,

     'balance' => $deduction->total_amount,     

      'date_taken' => request('date_taken'),

  ]);

  if($deductionUpdate)

    return redirect('deductions')

    ->with('success','Deduction updated successfully');
    //redirect


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\deduction  $deduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deduction $deduction)
    {


      if ($deduction->delete()){

        return redirect('deductions')

        ->with('success','Deduction deleted successfully');

      }else{

        return back()->withInput()->with('error','Deduction could not be deleted');

      }
    }
}
