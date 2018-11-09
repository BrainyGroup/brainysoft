<?php

namespace BrainySoft\Http\Controllers;

use Illuminate\Http\Request;

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

            $net = DB::table('pays')

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
    }
}
