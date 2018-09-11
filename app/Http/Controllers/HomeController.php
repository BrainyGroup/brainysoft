<?php

namespace BrainySoft\Http\Controllers;


//use Mail;
use BrainySoft\User;
use Mail;


use BrainySoft\Mail\Salaryslip;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function company()
    {
      $employee = Employee::find(auth()->user()->id);

      return Company::find($employee->company_id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mail::send('emails.mailtrap', [], function($m){
        //   $m->to('yahaya.frezier@datahousetza.com','Yahaya Frezier')
        //   ->subject('You have registered')
        //   ->from('test@test.com','BrainySoft');
        // });
        $user = User::find(2);

        Mail::to($user)->send(new Salaryslip($user));

        return view('home');
    }
}
