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

    public function net(Request $request)
    {
            $company = $this->company(); 

            $max_pay = request('max_pay');

            $nets = DB::table('pays')

            ->where('pays.company_id', $company->id)

            ->where('pay_number', $max_pay)

            ->join('employees', 'employees.id','pays.employee_id')

            ->join('users', 'users.id','employees.user_id')

            ->select(

              'users.*',

              'employees.*',

              'pays.*'
              )
            ->get();

          
            return view('reports.net', compact( 'nets'));
    }
}
