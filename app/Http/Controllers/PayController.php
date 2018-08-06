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

class PayController extends Controller
{



  private function nsfEmployee($employee_id = null, $company_id = null)
  {
     $statutories = Statutory::where('type','=','SSF')->where('company_id','=', $company_id)->first();

     $salary = Employee::find($employee_id)->salary;

     return $salary->amount * $statutories->employee;
  }

  private function nsfEmployer($employee_id = null,$company_id = null)
  {
     $statutories = Statutory::where('type','=','SSF')->where('company_id','=', $company_id)->first();
     $salary = Employee::find($employee_id)->salary;
      return $salary->amount * $statutories->employer;
  }

  private function nsfTotal($employee_id = null,$company_id = null)
  {
     $statutories = Statutory::where('type','=','SSF')->where('company_id','=', $company_id)->first();
     $salary = Employee::find($employee_id)->salary;
      return $salary->amount * $statutories->total;
  }


  private function hiEmployee($employee_id = null,$company_id = null)
  {
     $statutories = Statutory::where('type','=','HI')->where('company_id','=', $company_id)->first();
     $salary = Employee::find($employee_id)->salary;
     return $salary->amount * $statutories->employee;
  }

  private function hiEmployer($employee_id = null,$company_id = null)
  {
      $statutories = Statutory::where('type','=','HI')->where('company_id','=', $company_id)->first();
      $salary = Employee::find($employee_id)->salary;
      return $salary->amount * $statutories->employer;
  }

  private function hiTotal($employee_id = null,$company_id = null)
  {
      $statutories = Statutory::where('type','=','HI')->where('company_id','=', $company_id)->first();
      $salary = Employee::find($employee_id)->salary;
      return $salary->amount * $statutories->total;

  }

  private function sdl($employee_id = null,$company_id = null)
  {
      $statutories = Statutory::where('type','=','SDL')->where('company_id','=', $company_id)->first();
      $salary = Employee::find($employee_id)->salary;
      return $salary->amount * $statutories->total;
  }

  private function wcf($employee_id = null,$company_id = null)
  {
      $statutories = Statutory::where('type','=','WCF')->where('company_id','=', $company_id)->first();
      $salary = Employee::find($employee_id)->salary;
      return $salary->amount * $statutories->total;
  }



  private function paye($taxable_pay = null,$company_id = null)
  {

    //$salary= Employee::find($employee_id)->salary;
    $payees  = Payee::where('company_id','=',$company_id)->get();

    //   foreach ($payees as $payee) {
    //     if(($salary->amount >= $payee->minimum) && ($salary->amount <= $payee->maximum)){
    //       if($payee->minimum == 0){
    //         return ($salary->amount * $payee->ratio) + $payee->offset;
    //       }else {
    //         return (($salary->amount - ($payee->minimum - 1)) * $payee->ratio) + $payee->offset;
    //       }
    //     }
    //   }
    //
    // }


    // foreach ($payees as $payee) {
    //   if(($salary->amount > $payee->minimum) && ($salary->amount <= $payee->maximum)){
    //       return (($salary->amount - $payee->minimum) * $payee->ratio) + $payee->offset;
    //     }
    //   }
    // }



      foreach ($payees as $payee) {
        if(($taxable_pay > $payee->minimum) && ($taxable_pay <= $payee->maximum)){
            return (($taxable_pay - $payee->minimum) * $payee->ratio) + $payee->offset;
          }
        }
      }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $company = Company::find(1);

          $pays = Pay::where('company_id', $company->id)->get();

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
    public function store(Request $request, Company $company)
    {

        //$pay= new Pay;

        $salaries = Salary::where('company_id',1)->get();



      foreach($salaries as $salary){


        $pay= new Pay;


        $pay->company_id = $company_id = $salary->company_id;

        $pay->employee_id = $employee_id = $salary->employee_id;



        $pay->user_id =  1;

        $pay->run_date = Carbon::now();



        $pay->salary = $salary->amount;


        $pay->nsf_employee = $nsf_employee = $this->nsfEmployee($employee_id, $company_id);

        $pay->nsf_employer = $nsf_employee =$this->nsfEmployer($employee_id, $company_id);

        $pay->nsf_total = $this->nsfTotal($employee_id, $company_id);


        $pay->hi_employee = $hi_employee = $this->hiEmployee($employee_id, $company_id);

        $pay->hi_employer = $this->hiEmployer($employee_id, $company_id);

        $pay->hi_total = $this->hiTotal($employee_id, $company_id);


        $pay->sdl = $this->sdl($employee_id, $company_id);
        $pay->wcf = $this->wcf($employee_id, $company_id);

        $pay->allowance = $allowance = 0.0;

        $pay->loan = $loan = 0.0;

        $pay->statutories = $statutories = 0.0;

        $pay->other = $other_deduction = 0.0;

        $pay->gloss = $gloss = $salary->amount + $allowance;

        $pay->taxable = $taxable_pay = $gloss - $nsf_employee;

        $pay->paye = $this->paye($taxable_pay, $company_id);



        $pay->net = $gloss - $nsf_employee - $hi_employee - $loan - $other_deduction;

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
