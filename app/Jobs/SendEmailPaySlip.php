<?php

namespace BrainySoft\Jobs;

use Mail;
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

use Illuminate\Contracts\Mail\Mailer;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailPaySlip implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    
    protected $user;
    protected $company;
    protected $pay;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Pay $pay,Company $company, User $user)
    {
        $this->user = $user;
        $this->company = $company;
        $this->pay = $pay;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


    $pay = $this->pay;




     if($pay->posted == false){

      return back()->with('error','Please post this pay');

     }else{             

     $employee = Employee::where('user_id', $this->user->id)->first();


     $designation = Designation::find($employee->designation_id);

     $scale = Scale::find($designation->scale_id);

     $level = Level::find($designation->level_id);

     $center = Center::find($employee->center_id);

     $payroll_group = Payroll_group::find($scale->payroll_group_id);

     $pay_statutory = Pay_statutory::where('pay_number',$pay->pay_number)

     ->where('employee_id', $employee->id)

     ->join('statutories','statutories.id','pay_statutories.statutory_id')

     ->join('statutory_types','statutory_types.id','statutories.statutory_type_id')

     ->select(
      'pay_statutories.*', 
      'statutory_types.name as statutory_type_name',
      'statutories.name as statutory_name')

     ->where('statutory_types.name','SSF')->first();

      $pay_ssf_statutory_sum = Pay_statutory::where('employee_id', $employee->id)

     ->join('statutories','statutories.id','pay_statutories.statutory_id')

     ->join('statutory_types','statutory_types.id','statutories.statutory_type_id')

     ->select(
      'pay_statutories.*', 
      'statutory_types.name as statutory_type_name',
      'statutories.name as statutory_name')

     ->where('statutory_types.name','SSF')->sum('pay_statutories.total');

     $pay_allowances = Pay_allowance::where('pay_number',$pay->pay_number)

     ->where('employee_id', $employee->id)

     ->join('allowance_types','allowance_types.id','pay_allowances.allowance_type_id')->get();

      $pay_deductions = Pay_deduction::where('pay_number',$pay->pay_number)

     ->where('employee_id', $employee->id)

     ->join('deduction_types','deduction_types.id','pay_deductions.deduction_type_id')->get();

     $employment_type = Employment_type::find($scale->employment_type_id);

     

        $email = new Payslip($this->user,$this->company,$this->pay,$employee,$designation,$scale,$level,$center,$payroll_group,$pay_ssf_statutory_sum,$pay_allowances,$pay_deductions,$employment_type,$pay_statutory);

        Mail::to($this->user->email)->queue($email);


    }
}
}
