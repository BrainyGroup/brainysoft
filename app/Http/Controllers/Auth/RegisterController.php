<?php

namespace BrainySoft\Http\Controllers\Auth;

use DB;
use Carbon\Carbon;
use BrainySoft\User;
use BrainySoft\Country;
use BrainySoft\Company;
use BrainySoft\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            // 'company_name' => 'required|string|unique:companies',
            // 'company_description' => 'required|string',
           
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \BrainySoft\User
     */
    protected function create(array $data)
    {

        

         
  //       DB::transaction( function() use($data){

       



  //     $lastCompanyId = DB::table('companies')->insertGetId([

        

  //       'name' => $data['company_name'],

  //       'description' => $data['company_description'],

  //       'country_id' => $data['country_id'],      
        

  //         ]);

  //     $lastUserId = DB::table('users')->insertGetId([
  //             'name' => $data['name'],
  //             'email' => $data['email'],
  //             'password' => Hash::make($data['password']),             
  //             'company_id' => $lastCompanyId,
              
  //       ]);

  //     $user = User::select('name','email','password')->where('id',$lastUserId)->first();


  //   return compact('user');


    

  // });


    






        $company = Company::create([
            'name' => $data['company_name'],
            'description' => $data['company_description'],
            'country_id' => $data['country_id'],
              'last_renew_date' => now(),
              'trial_expire_date' => now()->addMonth(3), 
              'expire_date' => now()->addMonth(3),  
              'employees' => 10,                
              'trial' => true, 
              'balance' => 0.00,
         
             'usage_count' => 0,         
            
        ]);

        return User::create([
            'title' => $data['title'],
            'firstname' => $data['firstname'], 
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'], 




            'name' => $data['name'],
            'email' => $data['email'], 
            'password' => Hash::make($data['password']),
            'company_id' => $company->id,

        ]);

         
     }
    
}
