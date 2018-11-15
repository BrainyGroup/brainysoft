<?php

namespace BrainySoft\Http\Controllers;

use DB;

use PDF;

use Mail;

use Exception;

use Carbon\Carbon;

use BrainySoft\Pay;

use BrainySoft\User;

use BrainySoft\Paye;

use BrainySoft\Salary;

use BrainySoft\Company;

use BrainySoft\Designation;

use BrainySoft\Center;

use BrainySoft\Scale;

use BrainySoft\Employee;

use BrainySoft\Statutory;

use BrainySoft\Deduction;

use BrainySoft\Allowance;

use Illuminate\Http\Request;

use BrainySoft\Pay_statutory;

use Illuminate\Support\Facades\Log;



class PayController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }

    public function downloadPDF($id){

    

     $pay = Pay::find($id);


     $company = $this->company();

     $employee = Employee::where('id', $pay->employee_id )->first();

     $user = User::where('id', $employee->user_id )->first();

     $designation = Designation::where('id', $employee->designation_id )->first();

    $center = Center::where('id', $employee->center_id )->first();

     $scale = Scale::where('id', $designation->scale_id )->first();

$pay_statutories_cummulative = Pay_statutory::where('employee_id',$pay->employee_id)->join('statutories','statutories.id', 'pay_statutories.statutory_id')  ->join('statutory_types','statutory_types.id', 'statutories.statutory_type_id')->select('pay_statutories.*','statutory_types.name as statutory_type_name','statutories.name as statutory_name')->where('statutory_types.name','SSF')->sum('pay_statutories.total');

$pay_statutories = Pay_statutory::where('employee_id',$pay->employee_id)
->where('pay_id', $id)->get();

$month_statutory = Pay_statutory::where('employee_id',$pay->employee_id)->where('pay_id', $id)
->join('statutories','statutories.id', 'pay_statutories.statutory_id')  ->join('statutory_types','statutory_types.id', 'statutories.statutory_type_id')->select('pay_statutories.*','statutory_types.name as statutory_type_name','statutories.name as statutory_name')->where('statutory_types.name','SSF')->first();


$statutory = Pay_statutory::where('employee_id',$pay->employee_id)->join('statutories','statutories.id', 'pay_statutories.statutory_id')  ->join('statutory_types','statutory_types.id', 'statutories.statutory_type_id')->select('pay_statutories.*','statutory_types.name as statutory_type_name','statutories.name as statutory_name')->where('statutory_types.name','SSF')->first();
 



     $pdf = PDF::loadView('pdf.payslip', compact('pay','employee','user','company','designation','center','scale','pay_statutories_cummulative','statutory','month_statutory'));
     // $pdf->stream('payslip.pdf'); //display in browser

     $pdf->setPaper([0, 0,297.6378 , 841.8898], 'portrait')->setWarnings(false)->save('myfile1.pdf');

     return $pdf->download('payslip_' . $pay->pay_number . '_' . $employee->identity . '.pdf');

     }
     

    private function company()
    {
      $user = User::find(auth()->user()->id);

      return Company::find($user->company_id);
    }

    private function sendSalarySlipEmail($id,$company,$fromPaySlipEmail,$fromPaySlipName,$paySlipSubject,$lastPayId)
    {

          try{

            $user = User::findOrFail(200);

            $pay = Pay::findOrFail($lastPayId);

            $data = [

              'email' => $fromPaySlipEmail,
              'sender' => $fromPaySlipName,
              'subject' => $paySlipSubject

            ];

            Mail::send('emails.salary_slip', ['user' => $user,'pay'=>$pay,'company'=>$company], function ($message) use ($user,$data) {

                $message->from($data['email'], $data['sender']);

                $message->to($user->email, $user->firstname)->subject($data['subject']);

                // $message->attach($pathToFile, ['as' => $display, 'mime' => $mime]);
            });
          }catch(Exception $e){

            report($e);

            return false;


          }
        }


//2 Sum of $allowanceSum
private function allowanceSum($employee_id = null, $company_id = null){

    return Allowance::where('employee_id',$employee_id)->sum('amount');

}


// 4.1 Calculate statutory
private function statutoryBeforePaye($employee_id = null, $company_id = null,$basic_salary = null){

   $statutories = DB::table('employee_statutories')

   ->join('statutories', 'statutories.id','employee_statutories.statutory_id')

   ->select('statutories.*', 'employee_statutories.id as employee_statutories_id')

    ->where('employee_statutories.employee_id',$employee_id)  

  ->where('employee_statutories.company_id', $company_id)
  

  ->where('statutories.before_paye', true)

  ->get();

  $pay_statutory_before['employee'] = 0;

  $pay_statutory_before['employer'] = 0;

  foreach($statutories as $statutory){

    $pay_statutory_before['employee'] = $pay_statutory_before['employee'] + ($statutory->employee * $basic_salary);

    $pay_statutory_before['employer'] = $pay_statutory_before['employer'] + ($statutory->employer * $basic_salary);



  }

  return   $pay_statutory_before;
}



// 4.2 Calculate statutory
private function statutoryAfterPaye($employee_id = null, $company_id = null,$basic_salary=null){
   $statutories = DB::table('employee_statutories')

   ->join('statutories', 'statutories.id','employee_statutories.statutory_id')

   ->select('statutories.*', 'employee_statutories.id as employee_statutories_id')

    ->where('employee_statutories.employee_id',$employee_id)  

  ->where('employee_statutories.company_id', $company_id)
  

  ->where('statutories.before_paye', false)

  ->get();

  $pay_statutory_after['employee'] = 0;

  $pay_statutory_after['employer'] = 0;

  ;

  foreach($statutories as $statutory){

    $pay_statutory_after['employee'] = $pay_statutory_after['employee'] + ($statutory->employee * $basic_salary);

    $pay_statutory_after['employer'] = $pay_statutory_after['employer'] + ($statutory->employee * $basic_salary);


  }

  return $pay_statutory_after;
}



//7 Paye
private function paye($employee_id = null,$country_id = null,$taxable_salary = 0)
{

  $taxable_pay = $taxable_salary;
  

  $payes  = Paye::where('country_id',$country_id)->get();

    foreach ($payes as $paye) {   


      if(($taxable_pay > $paye->minimum) && ($taxable_pay <= $paye->maximum)){

        return ((($taxable_pay - $paye->minimum) * $paye->ratio) + $paye->offset);

        }

      }

    }



//9 deduction
private function deductionSum($employee_id = null,$company_id = null){

      return Deduction::where('employee_id',$employee_id)->sum('amount');

}




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
          $company = $this->company();        

          $employeeExist = Employee::where('company_id', $company->id)->exists();

          if(!$employeeExist){

            return redirect('users')->withInput()->with('error','Please add at least one employee to run eanring pay');
          }

          $login_user = Employee::where('user_id', auth()->user()->id)->first();

          // $pays = Pay::where('company_id', $login_user->company_id)->get();
            $max_pay = Pay::where('company_id', $company->id )->max('pay_number');

            $pay_periods = DB::table('pays')->distinct()->select('pay_number')->get();

            $month_gross = Pay::where('pay_number', $max_pay)

            ->where('company_id',$company->id)

            ->sum('gloss');

         

            $month_paye = Pay::where('pay_number', $max_pay)

             ->where('company_id',$company->id)

            ->sum('paye');

            $month_net = Pay::where('pay_number', $max_pay)

             ->where('company_id',$company->id)

            ->sum('net');

            $deduction_sum = Pay::where('pay_number', $max_pay)

             ->where('company_id',$company->id)

            ->sum('deduction');

             $isPosted = Pay::where('company_id', $company->id)

             ->where('pay_number', $max_pay)

             ->where('posted', true)

             ->exists();


            $statutory_sum = Pay_statutory::where('pay_number', $max_pay)

            ->where('company_id',$company->id)

            ->sum('total');


        $pay_statutories = DB::table('pay_statutories')

        ->select(

          'statutory_id',

          DB::raw('SUM(total) as total_amount'))

          ->where('pay_number',$max_pay)

           ->where('company_id',$company->id)

          ->groupBy('statutory_id');


           $statutories = DB::table('statutories')

        ->joinSub($pay_statutories, 'pay_statutories', function($join) {

        $join->on('statutories.id','pay_statutories.statutory_id');

      })     

        ->select(

          'pay_statutories.*',        

          'statutories.name as statutory_name'       

          )

          ->get();       


            $pays = DB::table('pays')
            ->where('pays.company_id', $company->id)
            ->join('employees', 'employees.id','pays.employee_id')
            ->join('users', 'users.id','employees.user_id')
            ->select(

              'users.*',

              'employees.*',

              'pays.*'
              )
            ->get();

            $total = $month_net + $month_paye + $statutory_sum + $deduction_sum;

          return view('pays.index', compact(
            'pays',
            'month_gross',
            'month_net',
            'month_paye',
            'month_sdl',
            'statutories',
            'max_pay',
            'deduction_sum',
            'isPosted',
            'total'
          ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

          $company = $this->company();

          $employeeExist = Employee::where('company_id', $company->id)->exists();

          if(!$employeeExist){

            return redirect('users')->withInput()->with('error','Please add at least one employee to view employees');
          }
          return view('pays.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)    {

    


        DB::transaction( function(){

          // TODO: below item should be company variable or setting
          $fromPaySlipEmail = 'payroll@datahousetza.com';
          $fromPaySlipName = 'Payroll Datahouse';
          $paySlipSubject = 'Pay Slip';

          //end of todo

          $year = request('year');

          $month = request('month');

          if( strlen($month) == 1){
            $month = '0'.$month;
          }

          $pay_number = $year.$month;



          $company = $this->company();

          $company->id = $company->id;

          //$company = Company::findOrFail($company->id);

          $company_name = $company->name;

          $company_logo = $company->logo;

          $company_domain = $company->website;

          $salaries = Salary::where('company_id', $company->id)->get();

          $company = Company::find($company->id);

          $country_id = $company->country_id;

         

          $payPosted = Pay::where('pay_number', $pay_number)
          ->where('company_id', $company->id)
          ->where('posted', true)->exists();

          $payNotPosted = Pay::where('pay_number', $pay_number)
          ->where('company_id', $company->id)
          ->where('posted', false)->exists();

           

          if($payPosted){
             return back()->withInput()->with('error','Pay for selected month exist');
          }elseif($payNotPosted){

            $pays = Pay::where('pay_number', $pay_number)->get();

            foreach($pays as $pay){

              $this->update($pay->id,$pay_number);
            }

          }else{






      foreach($salaries as $salary){

        $employee_id = $salary->employee_id;


        $employee = Employee::select('user_id')
                    ->where('id',$employee_id)
                    ->where('company_id',$company->id)
                    ->first();


        $company->id = $salary->company_id;

        $basic_salary = $salary->amount;

        $allowance = $this->allowanceSum($employee_id, $company->id);

        $statutory_before_paye = $this->statutoryBeforePaye($employee_id, $company->id,$basic_salary);

      


        $statutory_after_paye = $this->statutoryAfterPaye($employee_id, $company->id,$basic_salary);

        $salary_after_statutory_before_paye = $basic_salary -   $statutory_before_paye['employee'];

        $taxable =   $salary_after_statutory_before_paye + $allowance;

        $gloss = $basic_salary + $allowance;

        $paye = $this->paye($employee_id,$country_id, $taxable);

        $monthly_earning =   $taxable - $paye -   $statutory_after_paye['employee'];

        $deduction = $this->deductionSum($employee_id, $company->id);

        $net =   $monthly_earning - $deduction;



        $lastPayId = DB::table('pays')->insertGetId([

          'company_id' =>  $company->id,

          'employee_id' => $employee_id,

          'run_date' => Carbon::now(),

          'pay_number' => $pay_number,

          'basic_salary' => $basic_salary,

          'allowance' => $allowance,

          'gloss' => $basic_salary + $allowance,

          'taxable' => $taxable,

          'paye' => $paye,

          'monthly_earning' => $monthly_earning,

          'deduction' => $deduction,

          'net' => $net,

          'year' => $year,

          'month' => $month,

          'created_at' =>now(),

          'updated_at' =>now(),

            ]);

            // $statutories = Employee::find($employee_id)->statutories()
            // ->where('statutories.company_id', $company->id)
            // ->get();

    $statutories = DB::table('employee_statutories')

   ->join('statutories', 'statutories.id','employee_statutories.statutory_id')

   ->select('statutories.*', 'employee_statutories.id as employee_statutories_id')

    ->where('employee_statutories.employee_id',$employee_id)  

  ->where('employee_statutories.company_id', $company->id)  

  ->get();

foreach($statutories as $statutory){

  if($statutory->base_id == 1){
    $statutory_employee = $statutory->employee * $basic_salary;
    $statutory_employer = $statutory->employer * $basic_salary;
  }else {
    $statutory_employee = $statutory->employee * $gloss;
    $statutory_employer = $statutory->employer * $gloss;
  }
            DB::table('pay_statutories')->insert([
                    'company_id' => $company->id,
                    'employee_id' => $employee_id,
                    'pay_id' => $lastPayId,
                    'pay_number' => $pay_number,
                    'employee' =>   $statutory_employee,
                    'employer' =>   $statutory_employer,
                    'total' =>   $statutory_employer + $statutory_employee,
                    'statutory_id' => $statutory->id,
                    'created_at' =>now(),
                    'updated_at' =>now(),
                ]);
          }





$this->sendSalarySlipEmail($employee->user_id,$company,$fromPaySlipEmail,$fromPaySlipName,$paySlipSubject,$lastPayId);

}
}

});



return redirect('pays');






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pay $pay)
    {

      $company = $this->company();

          $employeeExist = Employee::where('company_id', $company->id)->exists();

          if(!$employeeExist){

            return redirect('users')->withInput()->with('error','Please add at least one employee to view employees');
          }
        return view('pays.show',compact('pay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->company();

          $employeeExist = Employee::where('company_id', $company->id)->exists();

          if(!$employeeExist){

            return redirect('users')->withInput()->with('error','Please add at least one employee to view employees');
          }

          //return view('pays.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function post($max_pay)
    {

       $company = $this->company();
        

        DB::table('pays')

       ->where('pay_number', $max_pay)

       ->where('company_id',$company->id)

       ->update([
         'posted' => 1,       

       ]);

       return back();

    }


    public function update($id,$pay_number)
    {

       $pay = Pay::find($id);

       $company = $this->company();



       $salary = Salary::where('employee_id', $pay->employee_id)



       ->where('company_id',$pay->company_id)

       ->first();

       $employee_id = $salary->employee_id;

     

       //$company->id = $salary->company_id;

       $basic_salary = $salary->amount;

       $allowance = $this->allowanceSum($employee_id, $company->id);

       $statutory_before_paye = $this->statutoryBeforePaye($employee_id, $company->id,$basic_salary);

       $statutory_after_paye = $this->statutoryAfterPaye($employee_id, $pay_number,$basic_salary);

       $salary_after_statutory_before_paye = $basic_salary -   $statutory_before_paye['employee'];

       $taxable =   $salary_after_statutory_before_paye + $allowance;

       $gloss = $basic_salary + $allowance;

       $paye = $this->paye($employee_id,$company->id, $taxable);

       $monthly_earning =   $taxable - $paye -   $statutory_after_paye['employee'];

       $deduction = $this->deductionSum($employee_id, $company->id);

       $net =   $monthly_earning - $deduction;



       DB::table('pays')

       ->where('id',$id)

       ->where('company_id',$company->id)

       ->update([


         'run_date' => Carbon::now(),


         'basic_salary' => $basic_salary,

         'allowance' => $allowance,

         'gloss' => $basic_salary + $allowance,

         'taxable' => $taxable,

         'paye' => $paye,

         'monthly_earning' => $monthly_earning,

         'deduction' => $deduction,

         'net' => $net,

         'updated_at' =>now(),

       ]);


      //  $statutories = Employee::find($employee_id)->statutories()
      // ->where('statutories.company_id', $company->id)
      // ->get();


    $statutories = DB::table('employee_statutories')

   ->join('statutories', 'statutories.id','employee_statutories.statutory_id')

   ->select('statutories.*', 'employee_statutories.id as employee_statutories_id')

    ->where('employee_statutories.employee_id',$employee_id)  

  ->where('employee_statutories.company_id', $company->id)  

  ->get();

              foreach($statutories as $statutory){

              if($statutory->base_id == 1){
              $statutory_employee = $statutory->employee * $basic_salary;
              $statutory_employer = $statutory->employer * $basic_salary;
              }else {
              $statutory_employee = $statutory->employee * $gloss;
              $statutory_employer = $statutory->employer * $gloss;
              }
                    DB::table('pay_statutories')->where('pay_id',$id)
                    ->where('employee_id', $employee_id)
                    ->where('company_id', $company->id)
                    ->where('statutory_type_id',$statutory->statutory_type_id)
                    ->update([

                            'employee' =>   $statutory_employee,
                            'employer' =>   $statutory_employer,

                            'updated_at' =>now(),
                        ]);
    }





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay $pay)
    {
      // TODO: delete with its statutory, allowance and deductions
      $is_unposted_pay = Pay::uposted('id',$pay->id)->exixts();

      if ($is_unposted_pay){

          DB::transaction( function() use ($pay) {

            DB::table('pays')
            ->where('id', $pay->id)
            ->delete();

            DB::table('pay_statutories')
            ->where('pay_id', $pay->id)
            ->delete();

          });



        return redirect('pays.index')

        ->with('success','Pay deleted successfully');

      }else{

        return back()->withInput()->with('error','Pay could not be deleted');

      }
    }
}
