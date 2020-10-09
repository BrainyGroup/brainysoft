<?php

namespace BrainySoft\Http\Controllers\Payroll;



use PDF;

use Mail;

use Exception;

use DataTables;

use Carbon\Carbon;

use BrainySoft\Payroll\Pay;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Bank;

use BrainySoft\Payroll\Paye;

use BrainySoft\Payroll\Salary;

use BrainySoft\Payroll\Company;

use BrainySoft\Payroll\Employee;

use BrainySoft\Payroll\Statutory;

use BrainySoft\Payroll\Deduction;

use BrainySoft\Payroll\Allowance;

use Illuminate\Http\Request;

use BrainySoft\Payroll\Pay_statutory;

use BrainySoft\Payroll\Pay_deduction;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

use BrainySoft\Http\Controllers\Controller;




class ReportController extends Controller
{

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

        $company = $this->company();

        $user = User::find(auth()->user()->id);

        $employee = Employee::where('user_id',$user->id)->first();

        if($employee){
          $employee_id = $employee->id;
        }else{
          $employee_id = 0;
        }

        

        $max_pay = Pay::where('posted', 1)
        ->where('company_id', $company->id)
        ->max('pay_number');


        return view('reports.index', compact('max_pay','employee_id'));

     }

    public function indexUser()
    {      

        $company = $this->company();

        //return DataTables::of(User::query()->where('company_id',$company->id))->make(true);        

     }

    public function createUser()
    {      

     return view('reports.display_user');      

     }

     public function indexPay()
    {      

        $company = $this->company();

        //return DataTables::of(Pay::query())->make(true);        

     }

    public function createPay()
    {      

     return view('reports.display_pay');      

     }

    public function pays(){

    }

    public function pay_by_employee(Request $request){

      $user = User::find(auth()->user()->id);

      $company = $this->company();

      $employee = Employee::where('user_id',$user->id)

                  ->where('company_id', $company->id)
                  
                  ->first();
      if($employee){
        $employee_id = $employee->id;

      }else{
        $employee_id = 0;

      }

                 
                 
                  $pay_deductions = DB::table('pay_deductions')

                  ->select(
          
                    'pay_id',
          
                    DB::raw('SUM(amount) as deduction'))
          
                    ->where('employee_id', $employee_id)    
                   
          
                    ->groupBy('pay_id');

                   
       
                    $pays = DB::table('pays')

                    ->joinSub($pay_deductions, 'pay_deductions', function($join) {
            
                    $join->on('pay_deductions.pay_id','pays.id');
            
                  })
                  
                  ->select(

                    'pays.*',

                    'pay_deductions.*'

                  )
                  ->get();              

                    


      return view('reports.employee_pay', compact( 'pays', 'user'));

    }



    public function net(Request $request)
    {
            $company = $this->company(); 

            $max_pay = request('max_pay');

            $net_total = DB::table('pays')

            ->where('pays.company_id', $company->id)

            ->where('pay_number', $max_pay)

            ->sum('net');

            $net_balance = DB::table('pays')

            ->where('pays.company_id', $company->id)

            ->where('pay_number', $max_pay)

            ->sum('pays.net_balance');

            $net_paid = $net_total - $net_balance;



            $nets = DB::table('pays')

            ->where('pays.company_id', $company->id)

            ->where('pay_number', $max_pay)

            ->join('employees', 'employees.id','pays.employee_id')

             ->join('banks', 'banks.id','employees.bank_id')

            ->join('users', 'users.id','employees.user_id')

            ->select(

              'users.*',

              'employees.*',

              'banks.name as bank_name',

              'pays.*'
              )
            ->get();

           
          
            return view('reports.net', compact( 'nets','max_pay','company','net_paid','net_balance','net_total'));
    }



    public function monthlyCreate()
    {
    	 $company = $this->company(); 
    	 $min_year = Pay::where('company_id', $company->id)
       ->where('posted', true)->min('year');

       $min_year = Pay::where('company_id', $company->id)
       ->where('posted', true)->min('year');

       $months = Pay::distinct('month')->where('company_id', $company->id)
       ->where('posted', true)->get(['month']);

       

       //$month = DB::table('pays')->distinct('month')->get();

       if(!$min_year) $min_year = Carbon::now()->format('Y');

       $max_year = Carbon::now()->format('Y');

       $years = [];
       for ($y = $max_year;$y >=  $min_year; $y-- ){
        $years[] = $y;
       }
       
    	 return view('reports.monthly_create', compact( 'years','months'));

    }

    public function monthly_summary(Request $request)
    {
          $company = $this->company();        

          $employeeExist = Employee::where('company_id', $company->id)->exists();

          if(!$employeeExist){

            return redirect('users')->withInput()->with('error','Please add at least one employee to run eanring pay');
          }

          

          $login_user = Employee::where('user_id', auth()->user()->id)->first();

          // $pays = Pay::where('company_id', $login_user->company_id)->get();
            //$max_pay = Pay::where('company_id', $company->id )->max('pay_number');
            $month = request('month');

            if (strlen($month) == 1) $month = "0" . $month;

          
            $max_pay = request('year').$month ;

            //dd($max_pay);

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

            $month_net_balance = Pay::where('pay_number', $max_pay)

            ->where('company_id', $company->id)
    
            ->sum('net_balance');
    
            $month_paid = $month_net -  $month_net_balance;

            $deduction_sum = Pay::where('pay_number', $max_pay)

             ->where('company_id',$company->id)

            ->sum('deduction');

          

            $month_paye_amount = DB::table('statutory_payments')

            ->where('company_id',$company->id)

            ->where('pay_number', $max_pay)

           ->value('amount');


           $month_paye_balance = DB::table('statutory_payments')

           ->where('company_id',$company->id)

           ->where('pay_number', $max_pay)

          ->value('balance');


$month_paye_paid = $month_paye_amount - $month_paye_balance; 
 

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

      $statutory_payments = DB::table('statutory_payments')

          ->select(

              'statutory_id',

              DB::raw('SUM(balance) as balance'))

 

          ->where('pay_number', $max_pay)

          ->where('company_id', $company->id)

          ->groupBy('statutory_id');


           $statutories = DB::table('statutories')

        ->joinSub($pay_statutories, 'pay_statutories', function($join) {

        $join->on('statutories.id','pay_statutories.statutory_id');

      })   
      
      ->joinSub($statutory_payments, 'statutory_payments', function ($join) {

        $join->on('statutories.id', 'statutory_payments.statutory_id');            

    })


        ->select(

          'pay_statutories.*',        

          'statutories.name as statutory_name',
          
          'statutory_payments.*'

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
            'month_paye_paid',
            'month_paye_balance',
            'month_sdl',
            'statutories',
            'max_pay',
            'deduction_sum',
            'isPosted',
            'month_net_balance',
            'month_paid',
            'total'
          ));
    }

    public function yearlyCreate()
    {
      $company = $this->company(); 

      $years = Pay::distinct('year')->where('company_id', $company->id)
      ->where('posted', true)->get(['year']);

      
      return view('reports.yearly_create', compact( 'years'));

    }

    public function yearly_pay(Request $request)
    {
          $company = $this->company(); 

          $year = request('year');

          $months = Pay::distinct('month')->where('year',$year)->pluck('month')->toArray();;
       
         

          $year_pays = DB::table('pays')      

                     ->select( 'pay_number', DB::raw('sum(basic_salary) as basic_salary
                                  ,sum(allowance) as allowance 
                                  ,sum(gloss) as gloss 
                                  ,sum(taxable) as taxable 
                                  ,sum(paye) as paye 
                                  ,sum(monthly_earning) as monthly_earning 
                                  ,sum(deduction) as deduction                                  
                                  ,sum(net) as net                                   
                                  '))
                     ->where('year', $year)
                     ->where('posted', 1)
                     ->groupBy('pay_number')
                     ->get();



                     $statutory_sum = [];
                     $pay_statutories =[];
                     $statutories = [];

            foreach($months as $month){

              if(strlen($month)==1){ $month = "0".$month; }

              $pay_number = $year.$month;

            }

             
              
              $statutory_sum= Pay_statutory::where('pay_number', $pay_number )

              ->where('company_id', $company->id)

             
  
              ->sum('total');

            

              
  
          $pay_statutories = DB::table('pay_statutories')
  
              ->select(
  
                  'statutory_id','pay_number',
  
                  DB::raw('SUM(total) as total_amount'))
  
              
              ->where('company_id', $company->id)
  
              ->groupBy('statutory_id')
              
              ->groupBy('pay_number');


       
            
  
          $statutories= DB::table('statutories')
  
              ->joinSub( $pay_statutories, 'pay_statutories', function ($join) {
  
                  $join->on('statutories.id', 'pay_statutories.statutory_id');
  
              })
  
              ->select(
  
                  'pay_statutories.*',
  
                  'statutories.name as statutory_name'
  
              )->orderBy('statutory_id')
  
              ->get();

              $pay_statutory_ids = DB::table('pay_statutories')
  
              ->select(
  
                  //'statutory_id')
  
                  DB::raw('distinct(statutory_id) '))
  
              
              ->where('company_id', $company->id)
  
           
              
              ->where('year', $year);

          
              $statutory_count = DB::table('pay_statutories')
  
              ->select(
  
                  //'statutory_id')
  
                  DB::raw('COUNT(distinct(statutory_id)) '))
  
              
              ->where('company_id', $company->id)
  
           
              
              ->where('year', $year)->get();

              


       


          $statutory_names= DB::table('statutories')
  
          ->joinSub( $pay_statutory_ids, 'pay_statutory_ids', function ($join) {

              $join->on('statutories.id', 'pay_statutory_ids.statutory_id');

          })

          ->select(

              'pay_statutory_ids.*',

              'statutories.name as statutory_name'

          )->orderBy('statutory_id')

          ->get();
          

     


                     //dd($year_pays);

     return view('reports.yearly_pay', compact( 'year_pays','year','statutories','months','statutory_names','statutory_count'));


         



    }

    
    public function statutoryList(Request $request)
    {
            $company = $this->company(); 

            $max_pay = request('max_pay');

            $statutory_id = request('statutory_id');

            $statutory = Statutory::find($statutory_id);

            $statutory_name = $statutory->name;

            
            $total_statutory = DB::table('pay_statutories')

            ->where('pay_statutories.company_id', $company->id)

            ->where('pay_statutories.statutory_id',  $statutory_id)

            ->where('pay_number', $max_pay)

            ->sum('pay_statutories.total');


            $pay_statutories = DB::table('pay_statutories')

            ->where('pay_statutories.company_id', $company->id)

            ->where('pay_statutories.pay_number', $max_pay)

            ->where('pay_statutories.statutory_id',  $statutory_id)

            ->join('employees', 'employees.id','pay_statutories.employee_id')
            
            ->join('users', 'users.id','employees.user_id')

            //->join('employee_statutories', 'employee_statutories.statutory_id','pay_statutories.statutory_id')

         

            

            ->select(

              'users.*',

              'employees.*',  
              
              //'employee_statutories.employee_statutory_no',

              'pay_statutories.*'
              )
            ->get();

            
          
            return view('reports.statutory_list', compact( 'pay_statutories','max_pay','statutory_name','total_statutory'));
    }

        public function paye(Request $request)
    	{
           
             $company = $this->company(); 
             
             $title = 'P.A.Y.E. - DETAILS OF PAYMENT OF TAX WITHHELD';

          	$login_user = Employee::where('user_id', auth()->user()->id)->first();
         
            $max_pay = Pay::where('company_id', $company->id )->max('pay_number');

            $pay_periods = DB::table('pays')->distinct()->select('pay_number')->get();   

            




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
            ->where('pays.pay_number', $max_pay)
            ->join('employees', 'employees.id','pays.employee_id')
            ->join('users', 'users.id','employees.user_id')
            ->select(

              'users.*',

              'employees.*',

              'pays.*'
              )
            ->get();

        

          return view('reports.paye', compact('pays','title'));
    }

    public function payDetails(Request $request)
    {

    			$company = $this->company(); 

    			$max_pay = request('max_pay');
    	 $pays = DB::table('pays')
            ->where('pays.company_id', $company->id)
             ->where('pays.pay_number', $max_pay)
            ->join('employees', 'employees.id','pays.employee_id')
            ->join('users', 'users.id','employees.user_id')
            ->select(

              'users.*',

              'employees.*',

              'pays.*'
              )
            ->get();

          

          return view('reports.pay_details', compact(
            'pays',
            'max_pay'
          
          ));
    }


     public function currentPay(Request $request)
    	{
           
           	          $company = $this->company();        

          $employeeExist = Employee::where('company_id', $company->id)->exists();

          if(!$employeeExist){

            return redirect('users')->withInput()->with('error','Please add at least one employee to run eanring pay');
          }

          $login_user = Employee::where('user_id', auth()->user()->id)->first();

          // $pays = Pay::where('company_id', $login_user->company_id)->get();

          if((request('year') != null)){

          	$year = request('year');

          $month = request('month');

          if( strlen($month) == 1){
            $month = '0'.$month;
          }

          $max_pay = $year.$month;

          }else{
            $max_pay = Pay::where('company_id', $company->id )

            ->where('posted', true )

            ->max('pay_number');
        }

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
             ->where('pays.pay_number', $max_pay)
            ->join('employees', 'employees.id','pays.employee_id')
            ->join('users', 'users.id','employees.user_id')
            ->select(

              'users.*',

              'employees.*',

              'pays.*'
              )
            ->get();

            $count = 0;

            $total = $month_net + $month_paye + $statutory_sum + $deduction_sum;

          return view('reports.current_pay', compact(
            'pays',
            'month_gross',
            'month_net',
            'month_paye',
            'month_sdl',
            'statutories',
            'max_pay',
            'deduction_sum',
            'isPosted',
            'total',
            'count'
          ));
    }





        public function netByBank(Request $request)
    	{
            $company = $this->company(); 

            $max_pay = request('max_pay');

            $net_total = DB::table('pays')

            ->where('pays.company_id', $company->id)

            ->where('pay_number', $max_pay)

            ->sum('net');

            $net_balance = DB::table('pays')

            ->where('pays.company_id', $company->id)

            ->where('pay_number', $max_pay)

            ->sum('pays.net_balance');

            $net_paid = $net_total - $net_balance;

            



            $net_by_banks = DB::table('pays')

             ->join('employees', 'employees.id','pays.employee_id')

             ->join('banks', 'banks.id','employees.bank_id')

            ->join('users', 'users.id','employees.user_id')

             ->select( 

             'bank_id',        

          	'banks.name as bank_name',

          	DB::raw('SUM(net) as bank_amount,SUM(net_balance) as net_balance'))

             ->where('pays.company_id', $company->id)

            ->where('pay_number', $max_pay)

              ->groupBy('bank_name','bank_id')

              ->get(); 




          
            return view('reports.net_by_bank', compact( 'net_by_banks','max_pay','net_total','net_balance','net_paid'));
        }

    public function netListByBank(Request $request)
    {
            $company = $this->company(); 

            $max_pay = request('max_pay');

            $bank_id = request('bank_id');

            $bank = Bank::find($bank_id);

            $bank_name = $bank->name;


            $net_total = DB::table('pays')

            ->where('pays.company_id', $company->id)

            ->where('pay_number', $max_pay)

            ->where('bank_id', $bank_id)

            ->join('employees', 'employees.id','pays.employee_id')

            ->join('banks', 'banks.id','employees.bank_id')

            ->sum('pays.net_balance');

            $net_balance = DB::table('pays')

            ->where('pays.company_id', $company->id)

            ->where('pay_number', $max_pay)

            ->where('bank_id', $bank_id)

            ->join('employees', 'employees.id','pays.employee_id')

            ->join('banks', 'banks.id','employees.bank_id')

            ->sum('pays.net_balance');

            $net_paid = $net_total - $net_balance;



            $net_list_by_banks = DB::table('pays')

            ->where('pays.company_id', $company->id)

            ->where('pay_number', $max_pay)

            ->where('bank_id', $bank_id)

            ->join('employees', 'employees.id','pays.employee_id')

             ->join('banks', 'banks.id','employees.bank_id')

            ->join('users', 'users.id','employees.user_id')

            ->select(

              'users.*',

              'employees.*',

              'banks.name as bank_name',

              'pays.*'
              )
            ->get();

           
          
            return view('reports.net_list_by_bank', compact( 'net_list_by_banks','bank_name','net_total','net_paid','net_balance'));
    }

    public function paye_yearly_create()
    {
      $company = $this->company(); 

      $years = Pay::distinct('year')->where('company_id', $company->id)
      ->where('posted', true)->get(['year']);

      
      return view('reports.paye_yearly_create', compact( 'years'));

    }

    public function paye_all(Request $request){

      $company = $this->company(); 

      

      $paye_all =  DB::table('statutory_payments')

      ->select(

    'year',
    

    'month',
    

    DB::raw('SUM(amount) as paye_amount, SUM(balance) as paye_balance '))

  

     ->where('company_id',$company->id)

     ->where('statutory_id',9999)

     ->groupBy('year') 

    ->groupBy('month')    

    ->get();

    $title = 'All Paye from to';

    $months = ['January','February','March','April','May','June','July','August','September','Octobar','November','December'];

    //dd( $paye_yearly);

    return view('reports.paye_all', compact('paye_all','months','year','title'));



    }

    public function paye_yearly(Request $request){

      $company = $this->company(); 

      $year = request('year');

      $paye_yearly =  DB::table('statutory_payments')

      ->select(

    

    'month',
    

    DB::raw('SUM(amount) as paye_amount, SUM(balance) as paye_balance '))

    ->where('year',$year)

     ->where('company_id',$company->id)

     ->where('statutory_id',9999)

    ->groupBy('month')    

    ->get();

    $title = 'Paye for Year ' . $year;

    $months = ['January','February','March','April','May','June','July','August','September','Octobar','November','December'];

    //dd( $paye_yearly);

    return view('reports.paye_all', compact('paye_yearly','months','year','title'));



    }

    
    
    public function statutory_yearly_create(Request $request){
      $company = $this->company(); 

      $years = Pay::distinct('year')->where('company_id', $company->id)
      ->where('posted', true)->get(['year']);

      $statutories = Statutory::
      where('id', '<>', 9999)
      ->where('company_id',$company->id)
      ->get();


      
      return view('reports.statutory_yearly_create', compact( 'years','statutories'));

    }

    
    public function statutory_yearly(Request $request){

      $company = $this->company(); 

      $year = request('year');

      $statutory_id = request('statutory');

      $statutory_yearly =  DB::table('statutory_payments')

      ->select(

    

    'month',
    

    DB::raw('SUM(amount) as paye_amount, SUM(balance) as paye_balance '))

    ->where('year',$year)

     ->where('company_id',$company->id)

     ->where('statutory_id',$statutory_id)

    ->groupBy('month')    

    ->get();

    $statutory_name = Statutory::where('id',$statutory_id)->value('name');

    $title = $statutory_name . ' for Year ' . $year;

    $months = ['January','February','March','April','May','June','July','August','September','Octobar','November','December'];

    //dd( $paye_yearly);

    return view('reports.statutory_yearly', compact('statutory_yearly','months','year','title','statutory_name'));



    }

    public function statutory_all_create(Request $request){
      $company = $this->company();

      $statutories = Statutory::
      where('id', '<>', 9999)
      ->where('company_id',$company->id)
      ->get();


      
      return view('reports.statutory_all_create', compact( 'statutories'));

    }

    
    public function statutory_all(Request $request){

      $company = $this->company(); 
    

      $statutory_id = request('statutory');

      $statutory_all =  DB::table('statutory_payments')

      ->select(

    
    'year',

    'month',
    

    DB::raw('SUM(amount) as paye_amount, SUM(balance) as paye_balance '))

   

     ->where('company_id',$company->id)

     ->where('statutory_id',$statutory_id)

     ->groupBy('year') 

    ->groupBy('month')    

    ->get();

    $statutory_name = Statutory::where('id',$statutory_id)->value('name');

    $title = $statutory_name . ' all ';

    $months = ['January','February','March','April','May','June','July','August','September','Octobar','November','December'];

   

    return view('reports.statutory_all', compact('statutory_all','months','title','statutory_name'));



    }

    public function statutory_employee_all_create(Request $request){
      $company = $this->company();

      $user = User::find(auth()->user()->id);

      $employee = Employee::where('user_id',$user->id)->first();

      if($employee){

        $employee_id = $employee->id;
      }

     

      $statutories = Statutory::

      where('company_id',$company->id)

      ->get();


      
      return view('reports.statutory_employee_all_create', compact( 'statutories'));

    }

    public function statutory_employee_all(Request $request){

      $company = $this->company(); 

      $user = User::find(auth()->user()->id);

      $employee = Employee::where('user_id',$user->id)->first();

      if($employee){

        $employee_id = $employee->id;
      }else{
        $employee_id = 0;
      }

    

      $statutory_id = request('statutory');

      $statutory_employee_all =  DB::table('pay_statutories')

      ->select(

    
    'year',

    'month',

    'employee',

    'employer',

    'total')

   

     ->where('company_id',$company->id)

     ->where('statutory_id',$statutory_id)

     ->where('employee_id',$employee_id)
   

    ->get();

    $statutory_name = Statutory::where('id',$statutory_id)->value('name');

    $title = $statutory_name . ' all ';

    $months = ['January','February','March','April','May','June','July','August','September','Octobar','November','December'];

   

    return view('reports.statutory_employee_all', compact('statutory_employee_all','months','title','statutory_name'));



    }

}
