<?php

namespace BrainySoft\Mail;

use BrainySoft\User;
use BrainySoft\Pay;
use BrainySoft\Company;
use BrainySoft\Employee;
use BrainySoft\Mail\Payslip;
use BrainySoft\Designation;
use BrainySoft\Scale;
use BrainySoft\Center;
use BrainySoft\Level;
use BrainySoft\Payroll_group;
use BrainySoft\Pay_statutory;
use BrainySoft\Pay_allowance;
use BrainySoft\Pay_deduction;
use BrainySoft\Employment_type;



use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Payslip extends Mailable
{
    use Queueable, SerializesModels;


      public $user;
      public $company;
      public $pay;
      public $designation;
      public $scale;
      public $level;
      public $center;
      public $employee;
      public $payroll_group;
      public $pay_statutory;
      public $pay_ssf_statutory_sum;
      public $pay_allowances;
      public $pay_deductions;
      public $employment_type;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,Company $company,Pay $pay,Employee $employee, Designation $designation,Scale $scale,Level $level,Center $center,Payroll_group $payroll_group,$pay_ssf_statutory_sum,$pay_allowances,$pay_deductions,$employment_type,$pay_statutory)
    {
        
        $this->user = $user;
        $this->company = $company;
        $this->pay = $pay;
        $this->employee = $employee;
        $this->designation = $designation;
        $this->scale = $scale;
        $this->level = $level;
        $this->center = $center;
        $this->payroll_group = $payroll_group;
        $this->pay_ssf_statutory_sum = $pay_ssf_statutory_sum;
        $this->pay_allowances = $pay_allowances;
        $this->pay_deductions = $pay_deductions;
        $this->employment_type = $employment_type;
        $this->pay_statutory = $pay_statutory;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.salary_slip');
    }
}
