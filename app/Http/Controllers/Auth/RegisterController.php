<?php

namespace BrainySoft\Http\Controllers\Auth;

use BrainySoft\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use BrainySoft\Payroll\User;
use BrainySoft\Payroll\Country;
use BrainySoft\Payroll\Company;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    //protected $redirectTo = RouteServiceProvider::HOME;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
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
            'employee' => false,
            'name' => $data['name'],
            'email' => $data['email'], 
            'password' => Hash::make($data['password']),
            'company_id' => $company->id,

        ]);
    }
}
