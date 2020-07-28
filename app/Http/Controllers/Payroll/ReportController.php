<?php

namespace BrainySoft\Http\Controllers;



use DB;

use PDF;

use Mail;

use Exception;

use DataTables;

use Carbon\Carbon;

use BrainySoft\Pay;

use BrainySoft\User;

use BrainySoft\Bank;

use BrainySoft\Paye;

use BrainySoft\Salary;

use BrainySoft\Company;

use BrainySoft\Employee;

use BrainySoft\Statutory;

use BrainySoft\Deduction;

use BrainySoft\Allowance;

use Illuminate\Http\Request;

use BrainySoft\Pay_statutory;

use Illuminate\Support\Facades\Log;




class ReportController extends Controller
{

	public function __construct()
    {

        $this->middleware('auth');

    }

 	private function company()
    {
      $user = User::find(auth()->user()->id);

      return Company::find($user->company_id);
    }


    public function index()
    {      

        $company = $this->company();

        $max_pay = Pay::where('posted', 1)
        ->where('company_id', $company->id)
        ->max('pay_number');


        return view('reports.index', compact('max_pay'));

     }

    public function indexUser()
    {      

        $company = $this->company();

        return DataTables::of(User::query()->where('company_id',$company->id))->make(true);        

     }

    public function createUser()
    {      

     return view('reports.display_user');      

     }

     public function indexPay()
    {      

        $company = $this->company();

        return DataTables::of(Pay::query())->make(true);        

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

      $pays = Pay::where('company_id',$company->id)

                    ->where('employee_id', $employee->id )

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

            ->sum('pays.net');

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

           
          
            return view('reports.net', compact( 'nets','max_pay','company','net_total'));
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

            ->join('employee_statutories', 'employee_statutories.statutory_id','pay_statutories.statutory_id')

         

            ->join('users', 'users.id','employees.user_id')

            ->select(

              'users.*',

              'employees.*',  
              
              'employee_statutories.*',

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



            $net_by_banks = DB::table('pays')

             ->join('employees', 'employees.id','pays.employee_id')

             ->join('banks', 'banks.id','employees.bank_id')

            ->join('users', 'users.id','employees.user_id')

             ->select( 

             'bank_id',        

          	'banks.name as bank_name',

          	DB::raw('SUM(net) as bank_amount'))

             ->where('pays.company_id', $company->id)

            ->where('pay_number', $max_pay)

              ->groupBy('bank_name','bank_id')

              ->get(); 




          
            return view('reports.net_by_bank', compact( 'net_by_banks','max_pay'));
        }

        public function netListByBank(Request $request)
    {
            $company = $this->company(); 

            $max_pay = request('max_pay');

            $bank_id = request('bank_id');

            $bank = Bank::find($bank_id);

            $bank_name = $bank->name;


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

           
          
            return view('reports.net_list_by_bank', compact( 'net_list_by_banks','bank_name'));
    }
}
