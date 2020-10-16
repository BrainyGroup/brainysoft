<?php

namespace BrainySoft\Http\Controllers;


//use Mail;
use BrainySoft\Payroll\User;
use BrainySoft\Payroll\Pay;


use BrainySoft\Payroll\Bank;
use BrainySoft\Payroll\Scale;
use BrainySoft\Payroll\Level;
use BrainySoft\Payroll\Center;
use BrainySoft\Payroll\Company;
//use BrainySoft\Payroll\Pay_type;
use BrainySoft\Payroll\Kin_type;
use BrainySoft\Payroll\Employee;
use BrainySoft\Payroll\Statutory;
use BrainySoft\Payroll\Pay_base;
use BrainySoft\Payroll\Department;
use BrainySoft\Payroll\Designation;
use BrainySoft\Payroll\Salary_base;
use BrainySoft\Payroll\Pay_statutory;
use BrainySoft\Payroll\Payroll_group;
use BrainySoft\Payroll\Allowance_type;
use BrainySoft\Payroll\Deduction_type;
use BrainySoft\Payroll\Statutory_type;
use BrainySoft\Payroll\Employment_type;
use Carbon\Carbon;

use Mail;
use Illuminate\Support\Facades\DB;


use BrainySoft\Mail\Salaryslip;

use Illuminate\Http\Request;

use BrainySoft\Http\Controllers\Controller;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
        $this->middleware('role');
    }

    private function company()
    {
      $user= User::find(auth()->user()->id);

      return Company::find($user->company_id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $company = $this->company();

        $centerDefined = Center::where('company_id',$company->id)->exists();

        $departmentDefined = Department::where('company_id',$company->id)->exists();

        $designationDefined = Designation::where('company_id',$company->id)->exists();

        $bankDefined = Bank::where('company_id',$company->id)->exists();

        $payrollGroupDefined = Payroll_group::where('company_id',$company->id)->exists();

       $employmentTypeDefined = Employment_type::where('company_id',$company->id)->exists();

        $levelDefined = Level::where('company_id',$company->id)->exists();

        $kinTypeDefined = Kin_type::where('company_id',$company->id)->exists();

        $scaleDefined = Scale::where('company_id',$company->id)->exists();

        $allowanceTypeDefined = Allowance_type::where('company_id',$company->id)->exists();

        $deductionTypeDefined = Deduction_type::where('company_id',$company->id)->exists();

        $payBaseDefined = Pay_base::where('company_id',$company->id)->exists();

        $statutoryDefined = Statutory::where('company_id',$company->id)->exists();

        $salaryBaseDefined = Salary_base::where('company_id',$company->id)->exists();

        $statutoryTypeDefined = Statutory_type::where('company_id',$company->id)->exists();

       
        // if(!$allowanceTypeDefined){
        // DB::table('allowance_types')->insert([
        //       'name' => 'Overtime',
        //       'description' => 'Overtime',
        //       'company_id' => 1,
        //       'created_at' =>now(),
        //       'updated_at' =>now(),
        //   ]);

        // }

        // if(!$bankDefined){
        // DB::table('banks')->insert([
        //       'name' => 'Exim Bank',
        //       'description' => 'Exim Bank',
        //       'company_id' => 1,
        //       'created_at' =>now(),
        //       'updated_at' =>now(),
        //   ]);
        // }


        if(!$centerDefined){
             DB::table('centers')->insert([
              'name' => 'HQ',
              'description' => 'Head Quota',
              'company_id' => $company->id,
              'number' => '0001',
              'created_at' =>now(),
              'updated_at' =>now(),
            ]);
        }

        // if(!$deductionTypeDefined){
        //       DB::table('deduction_types')->insert([
        //               'name' => 'Loan',
        //               'description' => 'Loan Deduction',
        //               'company_id' =>$company->id,
        //               'created_at' =>now(),
        //               'updated_at' =>now(),
        //           ]);

        //       DB::table('deduction_types')->insert([
        //               'name' => 'Share',
        //               'description' => 'Share Deduction',
        //               'company_id' => $company->id,
        //               'created_at' =>now(),
        //               'updated_at' =>now(),
        //   ]);
        // }

        if(!$departmentDefined){
             DB::table('departments')->insert([
              'name' => 'All',
              'description' => 'All staff',
              'company_id' => $company->id,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
        }


        if(!$designationDefined){
              DB::table('designations')->insert([
                      'name' => 'MD',
                      'description' => 'Managing Director',
                      'company_id' =>$company->id,
                      'scale_id' => 1,
                      'level_id' => 1, 
                      'created_at' =>now(),
                      'updated_at' =>now(),
                  ]);

        }

        // if(!$employmentTypeDefined){
        //           DB::table('employment_types')->insert([
        //                   'name' => 'Contract',
        //                   'description' => 'Contract',
        //                   'company_id' => $company->id,
        //                   'created_at' =>now(),
        //                   'updated_at' =>now(),
        //               ]);

        //          DB::table('employment_types')->insert([
        //                   'name' => 'Permanent',
        //                   'description' => 'Permanent',
        //                   'company_id' => $company->id,
        //                   'created_at' =>now(),
        //                   'updated_at' =>now(),
        //               ]);

        // }

        // if(!$kinTypeDefined){
        //           DB::table('kin_types')->insert([
        //                   'name' => 'Mother',
        //                   'description' => 'Parents',
        //                   'company_id' => $company->id,
        //                   'created_at' =>now(),
        //                   'updated_at' =>now(),
        //               ]);

        //           DB::table('kin_types')->insert([
        //                   'name' => 'Father',
        //                   'description' => 'Parents',
        //                   'company_id' => $company->id,
        //                   'created_at' =>now(),
        //                   'updated_at' =>now(),
        //               ]);
        //         DB::table('kin_types')->insert([
        //                 'name' => 'Wife',
        //                 'description' => 'Spouse',
        //                 'company_id' => $company->id,
        //                 'created_at' =>now(),
        //                 'updated_at' =>now(),
        //             ]);

        //         DB::table('kin_types')->insert([
        //                 'name' => 'Husband',
        //                 'description' => 'Spouse',
        //                 'company_id' => $company->id,
        //                 'created_at' =>now(),
        //                 'updated_at' =>now(),
        //             ]);
        // }


      //   if(!$levelDefined){
      //        DB::table('levels')->insert([
      //         'name' => 'Excutive',
      //         'description' => 'Chiefs',
      //         'company_id' => $company->id,
      //         'created_at' =>now(),
      //         'updated_at' =>now(),
      //     ]);

      // DB::table('levels')->insert([
      //         'name' => 'Directors',
      //         'description' => 'Directors and Heads',
      //         'company_id' => $company->id,
      //         'created_at' =>now(),
      //         'updated_at' =>now(),

      //     ]);

      // DB::table('levels')->insert([
      //         'name' => 'Managers',
      //         'description' => 'Managers',
      //         'company_id' =>  $company->id,
      //         'created_at' =>now(),
      //         'updated_at' =>now(),

      //     ]);


      // DB::table('levels')->insert([
      //         'name' => 'Supervisors',
      //         'description' => 'Supervisors',
      //         'company_id' =>  $company->id,
      //         'created_at' =>now(),
      //         'updated_at' =>now(),

      //     ]);

      // DB::table('levels')->insert([
      //         'name' => 'Officers',
      //         'description' => 'Officers',
      //         'company_id' =>  $company->id,
      //         'created_at' =>now(),
      //         'updated_at' =>now(),

      //     ]);
      //   }

        if(!$payBaseDefined){
          DB::table('pay_bases')->insert([
              'name' => 'monthly',
              'description' => 'Monthly',
              'company_id' =>  $company->id,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

     DB::table('pay_bases')->insert([
              'name' => 'fortynight',
              'description' => 'Permanent',
              'company_id' =>  $company->id,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

    
     DB::table('pay_bases')->insert([
              'name' => 'Weekly',
              'description' => 'Weekly',
              'company_id' =>  $company->id,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
    
     DB::table('pay_bases')->insert([
              'name' => 'Daily',
              'description' => 'Daily',
              'company_id' =>  $company->id,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
    
     DB::table('pay_bases')->insert([
              'name' => 'Hourly',
              'description' => 'Hourly',
              'company_id' =>  $company->id,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
     
     DB::table('pay_bases')->insert([
              'name' => 'Pages',
              'description' => 'Pages',
              'company_id' =>  $company->id,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

        }

        if(!$payrollGroupDefined){
       
      DB::table('payroll_groups')->insert([
              'name' => 'All',
              'description' => 'All staff',
              'company_id' => $company->id,
              'created_at' =>now(),
              'updated_at' =>now(),
          
          ]);
        }


      //   if(!$salaryBaseDefined){
      // DB::table('salary_bases')->insert([
      //         'name' => 'Basic',
      //         'description' => 'Basic salary',
      //         'company_id' => 1,
      //         'created_at' =>now(),
      //         'updated_at' =>now(),
      //     ]);

      // DB::table('salary_bases')->insert([
      //         'name' => 'Gross',
      //         'description' => 'Gross Salary',
      //         'company_id' => 1,
      //         'created_at' =>now(),
      //         'updated_at' =>now(),
      //     ]);

      // DB::table('salary_bases')->insert([
      //         'name' => 'Taxable',
      //         'description' => 'Taxable Salary',
      //         'company_id' => 1,
      //         'created_at' =>now(),
      //         'updated_at' =>now(),
      //     ]);

      // DB::table('salary_bases')->insert([
      //         'name' => 'Net bofore',
      //         'description' => 'Net before deduction',
      //         'company_id' => 1,
      //         'created_at' =>now(),
      //         'updated_at' =>now(),
      //     ]);

      // DB::table('salary_bases')->insert([
      //         'name' => 'Net',
      //         'description' => 'Net take home',
      //         'company_id' => 1,
      //         'created_at' =>now(),
      //         'updated_at' =>now(),
      //     ]);
      //   }


        if(!$scaleDefined){
       
       DB::table('scales')->insert([
              'name' => 'GSS',
              'description' => 'General Salary Scale',
              'company_id' => $company->id,
              'minimum' => '200',
              'maximum' => '40000000',
              'payroll_group_id' => 1,
              'employment_type_id' => 1,
              'pay_base_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
        }

        // if(!$statutoryTypeDefined){
       
    
      // DB::table('statutory_types')->insert([
      //         'name' => 'SSF',
      //         'description' => 'Social Security Fund',
      //         'company_id' => 1,                                    
      //         'created_at' =>now(),
      //         'updated_at' =>now(),
      //     ]);

      // DB::table('statutory_types')->insert([
      //         'name' => 'HI',
      //         'description' => 'Health Insurance',
      //         'company_id' => 1,     
      //         'created_at' =>now(),
      //         'updated_at' =>now(),
      //     ]);


      // DB::table('statutory_types')->insert([
      //         'name' => 'WCF',
      //         'description' => 'Worker Compasation Fund',
      //         'company_id' => 1,        
      //         'created_at' =>now(),
      //         'updated_at' =>now(),
      //     ]);


      // DB::table('statutory_types')->insert([
      //         'name' => 'SDL',
      //         'description' => 'School Development Levy',
      //         'company_id' => 1,        
      //         'created_at' =>now(),
      //         'updated_at' =>now(),
      //     ]);


      if(!$statutoryDefined){

            DB::table('statutories')->insert([
              'name' => 'NSSF',
              'description' => 'National Social Security Fund',
              'organization_id' => 1,
              'company_id' => $company->id,
              'employee' => 0.100,
              'employer' => 0.100,
              'total' => 0.200,
              'date_required' => '2018-08-07',
              'statutory_type_id' => 1,
              'base_id' => 1,
              'before_paye' => true,
              'selection' => true,
              'mandatory' => true,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);


          DB::table('statutories')->insert([
              'name' => 'PPF',
              'description' => 'Parastatal Pension Fund',
              'organization_id' => 2,
              'company_id' => $company->id,
              'employee' => 0.100,
              'employer' => 0.100,
              'total' => 0.200,
              'date_required' => '2018-08-07',
              'statutory_type_id' => 1,
              'base_id' => 1,
              'before_paye' => true,
              'selection' => true,
              'mandatory' => true,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);


         DB::table('statutories')->insert([
             'name' => 'NHIF',
              'description' => 'National Health Insurance Fund',
              'organization_id' => 3,
              'company_id' => $company->id,
              'employee' => 0.0300,
              'employer' => 0.0300,
              'total' => 0.0600,
              'date_required' => '2018-08-07',
              'statutory_type_id' => 2,
              'base_id' => 1,
              'before_paye' => false,
              'selection' => true,
              'mandatory' => false,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);


              DB::table('statutories')->insert([
              'name' => 'WCF',
              'description' => 'Worker Compasation Fund',
              'organization_id' => 4,
              'company_id' => $company->id,
              'employee' => 0.0000,
              'employer' => 0.0100,
              'total' => 0.0100,
              'date_required' => '2018-08-07',
              'statutory_type_id' => 3,
              'base_id' => 2,
              'before_paye' => false,
              'selection' => false,
              'mandatory' => true,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

              DB::table('statutories')->insert([
              'name' => 'SDL',
              'description' => 'School Development Levy',
              'organization_id' => 5,
              'company_id' => $company->id,
              'employee' => 0.000,
              'employer' => 0.0450,
              'total' => 0.0450,
              'date_required' => '2018-08-07',
              'statutory_type_id' => 4,
              'base_id' => 2,
              'selection' => false,
              'mandatory' => true,
              'before_paye' => false,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);
        }

        
        // $pays = DB::table('pays')

        // ->select(

        //   'month',

        //   DB::raw('SUM(gloss) as gloss'))

        //   ->thisYear()

        //    ->where('company_id',$company->id)

        //   ->groupBy('month')->get();

        $year = Carbon::now()->year;       
    

        $january_gloss = Pay::where('company_id', $company->id)

        ->where('pay_number', $year.'01' )

       ->sum('gloss');
       
       $february_gloss = Pay::where('company_id', $company->id)

       ->where('pay_number', $year.'02' )

      ->sum('gloss');

      $march_gloss = Pay::where('company_id', $company->id)

      ->where('pay_number', $year.'03' )

     ->sum('gloss');

     $april_gloss = Pay::where('company_id', $company->id)

     ->where('pay_number', $year.'04' )

    ->sum('gloss');

    $may_gloss = Pay::where('company_id', $company->id)

    ->where('pay_number', $year.'05' )

   ->sum('gloss');

   $june_gloss = Pay::where('company_id', $company->id)

   ->where('pay_number', $year.'06' )

  ->sum('gloss');

  $july_gloss = Pay::where('company_id', $company->id)

  ->where('pay_number', $year.'07' )

 ->sum('gloss');

 $august_gloss = Pay::where('company_id', $company->id)

 ->where('pay_number', $year.'08' )

->sum('gloss');

$semptember_gloss = Pay::where('company_id', $company->id)

->where('pay_number', $year.'09' )

->sum('gloss');

$october_gloss = Pay::where('company_id', $company->id)

->where('pay_number', $year.'10' )

->sum('gloss');

$november_gloss = Pay::where('company_id', $company->id)

->where('pay_number', $year.'11' )

->sum('gloss');

$december_gloss = Pay::where('company_id', $company->id)

->where('pay_number', $year.'12' )

->sum('gloss');


$yearly_pay_4 = Pay::where('company_id', $company->id)

->where('year', $year-4 )

->sum('gloss');

$yearly_pay_3 = Pay::where('company_id', $company->id)

->where('year', $year-3 )

->sum('gloss');


$yearly_pay_2 = Pay::where('company_id', $company->id)

->where('year', $year-2 )

->sum('gloss');

$yearly_pay_1 = Pay::where('company_id', $company->id)

->where('year', $year-1)

->sum('gloss');

$yearly_pay_0 = Pay::where('company_id', $company->id)

->where('year', $year)

->sum('gloss');

        $max_pay_number = Pay::where('company_id', $company->id)
        ->where('posted', true)
        ->max('pay_number');



        $monthly_gloss =  Pay::where('company_id', $company->id)

        ->where('pay_number', $max_pay_number )

       ->sum('gloss');  


        $monthly_net =  Pay::where('company_id', $company->id)

                   ->where('pay_number', $max_pay_number )
        
                  ->sum('net');

        $monthly_paye = Pay::where('company_id', $company->id)

                      ->where('pay_number', $max_pay_number )

                     ->sum('paye');

        $monthly_balance = Pay::where('company_id', $company->id)

                  ->where('pay_number', $max_pay_number )

                  ->sum('net_balance');

        $monthly_deduction = Pay::where('company_id', $company->id)

            ->where('pay_number', $max_pay_number )

            ->sum('deduction');

        $monthly_allowance = Pay::where('company_id', $company->id)

            ->where('pay_number', $max_pay_number )

            ->sum('allowance');

        $monthly_basic_salary = Pay::where('company_id', $company->id)

            ->where('pay_number', $max_pay_number )

            ->sum('basic_salary');


        $monthly_deduction = Pay::where('pay_number', $max_pay_number)

          ->where('company_id',$company->id)

          ->sum('deduction');




   $monthly_statutory = Pay_statutory::where('pay_number', $max_pay_number)

   ->where('company_id',$company->id)

   ->sum('total');


        $current_year = Carbon::now()->year;

        $annual_net =  Pay::where('company_id', $company->id)

                ->where('year', $current_year )

                ->sum('net');

                  

        $pays = Pay::where('pay_number',$max_pay_number)

        ->selectRaw('month, sum(gloss) as gloss')

        ->groupBy('month')

        ->pluck('gloss','month');

       // dd($pays);

       $monthly_total = $monthly_net + $monthly_paye + $monthly_statutory + $monthly_deduction;

      

       

        $value = [$january_gloss, $february_gloss,$march_gloss, $april_gloss, $may_gloss, $june_gloss, $july_gloss,
                  $august_gloss,$semptember_gloss,$october_gloss,$november_gloss,$december_gloss];

        $yearly_pay = [$yearly_pay_4, $yearly_pay_3,$yearly_pay_2,$yearly_pay_1,$yearly_pay_0];

        //dd(implode(',', $value));

       


        // $pay = Pay::where('year', 2018)->groupBy('month')->sum('gloss');

     
//dd($pays);

        return view('home',compact(
          'pays',
          'monthly_net',
          'annual_net',
          'value',
          'monthly_paye',
          'monthly_statutory',
          'monthly_deduction',
          'monthly_total',
          'year',
          'yearly_pay',
          'monthly_gloss')
        );
        // Mail::send('emails.mailtrap', [], function($m){
        //   $m->to('yahaya.frezier@datahousetza.com','Yahaya Frezier')
        //   ->subject('You have registered')
        //   ->from('test@test.com','BrainySoft');
        // });


        //Better way of sending email with view check the view
        // $user = User::find(2);

        // Mail::to($user)->send(new Salaryslip($user));

        // return view('home');
    }
}
