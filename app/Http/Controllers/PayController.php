<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payee;
use App\Pay;
use App\Salary;
use App\Employee;
use App\Statutory;
use Carbon\Carbon;
use App\Company;
use App\Deduction;

class PayController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }

//1 Basic Salary
private function basicSalary($employee_id = null, $company_id = null){

  $salary = Employee::find(1)->salary()->where('salaries.company_id', $company_id)->get();

  return $salary->amount;
}

//2 Sum of $allowanceSum
private function allowanceSum($employee_id = null, $company_id = null){

    return Allowance::where('employee_id',$employee_id)->sum('amount');

}

//3 Gloss Salary
private function glossSalary($employee_id = null, $company_id = null){
  return $this->basicSalary($employee_id,$company_id) + $this->allowanceSum($employee_id,$company_id)
}

// 4.1 Calculate statutory
private function statutoryBeforePaye($employee_id = null, $company_id = null, $pay_id = null){
  $statutories = Employee::find($employee_id)->statutories()
  ->where('statutories.before_paye', true)
  ->where('statutories.company_id', $company_id)
  ->get();

  foreach($statutories as $statutory){

    $pay_statutory = new Pay_statutory;

    $pay_statutory->employee_id = $employee_id;

    $pay_statutory->pay_number = 1;

    $pay_statutory_before['employee'] = 0;

    $pay_statutory_before['employer'] = 0;

    $pay_statutory->employee = $statutory->employee * $this->basicSalary($employee_id, $company_id);

    $pay_statutory->employer = $statutory->employer * $this->basicSalary($employee_id, $company_id);

    $pay_statutory_before['employee'] = $pay_statutory->employee + $pay_statutory_before['employee'];

    $pay_statutory_before['employer'] = $pay_statutory->employer + $pay_statutory_before['employer'];

    $pay_statutory->save();

  }

  return $pay_statutory_before;;
}

// 4.2 Calculate statutory
private function statutoryAfterPaye($employee_id = null, $company_id = null){
  $statutories = Employee::find($employee_id)->statutories()
  ->where('statutories.before_paye', false)
  ->where('statutories.company_id', $company_id)
  ->get();

  foreach($statutories as $statutory){

    $pay_statutory = new Pay_statutory;

    $pay_statutory->employee_id = $employee_id;

    $pay_statutory->pay_number = 1;

    $pay_statutory->employee = $statutory->employee * $this->basicSalary($employee_id, $company_id);

    $pay_statutory->employer = $statutory->employer * $this->basicSalary($employee_id, $company_id);

    $statutoryAmount = $pay_statutory->employee + $pay_statutory->employer;

    $pay_statutory_before;['employee'] = $pay_statutory->employee;

    $pay_statutory_before;['employer'] = $pay_statutory->employer;

    // $pay_statutory->save();


  }

  return $statutoryAmount;
}

//5 Salary after statutory deducted before payes

private function salaryAfterStatutoryBeforePaye($employee_id = null, $company_id = null){

  return basicSalary($employee_id, $company_id) - statutoryBeforePaye($employee_id, $company_id);

}

//6 Taxable Salary

private function taxableSalary($employee_id = null, $company_id = null){

  return salaryAfterStatutoryBeforePaye($employee_id, $company_id) + allowanceSum($employee_id, $company_id);

}

//7 Paye
private function paye($employee_id = null,$company_id = null)
{

  $taxable_pay = taxableSalary($employee_id, $company_id);

  $payees  = Payee::where('company_id','=',$company_id)->get();



    foreach ($payees as $payee) {

      if(($taxable_pay > $payee->minimum) && ($taxable_pay <= $payee->maximum)){

          return (($taxable_pay - $payee->minimum) * $payee->ratio) + $payee->offset;

        }

      }

    }

//8 Monthly earning before statutory after 4.2 and deduction
private function beforeDeduction($employee_id = null,$company_id = null){

  return taxableSalary($employee_id, $company_id) - paye($employee_id, $company_id)

}

//9 deduction
private function deductionSum($employee_id = null,$company_id = null){

      return Deduction::where('employee_id',$employee_id)->sum('amount');

}

//10 net earning
private fucntion netEarning($employee_id = null,$company_id = null){

  return beforeDeduction($employee_id, $company_id) -

          deductionSum($employee_id, $company_id) -

          statutoryAfterPaye($employee_id, $company_id)


}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $login_user = Employee::where('user_id', auth()->user()->id)->first();

          $pays = Pay::where('company_id', $login_user->company_id)->get();

          return view('pays.index', compact('pays'));
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

        //$pay= new Pay;

        $login_user = Employee::where('user_id', auth()->user()->id)->first();

        $company_id = $login_user->company_id;

        $salaries = Salary::where('company_id', $company_id)->get();

        $statutory_before_paye = $this.statutoryBeforePaye($employee_id, $company_id, $pay_number)



      foreach($salaries as $salary){


        $pay= new Pay;

        $employee_id = $salary->employee_id;

        $employee = Employee::find($employee_id);


        $pay->company_id = $salary->company_id;

        $pay->employee_id = $employee_id;

        $pay->run_date = Carbon::now();

        $pay->basic_salary = $salary->amount;


        //
        // $pay->statutory_employee = $statutory_before_paye['employee'];
        //
        // $pay->statutory_employer = $statutory_before_paye['employer'];
        //
        // $pay->statutory_total = $pay->statutory_employee + $pay->statutory_employer;
        //
        // $pay->deduction_employee ;
        //
        // $pay->deduction_employer ;
        //
        // $pay->deduction_total = $pay->deduction_employee + $pay->deduction_employer;

        $pay->allowance = $this->allowanceSum($employee_id, $company_id);

        $pay->gloss = $this->glossSalary($employee_id, $company_id);

        $pay->taxable = $this->taxableSalary($employee_id, $company_id);

        $pay->paye = $this->paye($employee_id,$company_id);

        $pay->net = $this->netEarning($employee_id, $company_id);

        $pay->mothly_earning = $this->beforeDeduction($employee_id = null,$company_id = null);

        $pay->after_statutory_before = $this->salaryAfterStatutoryBeforePaye($employee_id, $company_id);

      $pay->save();


      echo $pay;



        //return $pay;
      }


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
