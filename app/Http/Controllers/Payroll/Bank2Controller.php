<?php

namespace BrainySoft\Http\Controllers\Payroll;

use Illuminate\Http\Request;
//use BrainySoft\Http\Controllers\Controller;
use BrainySoft\Contracts\BankContract;
use BrainySoft\Http\Controllers\BaseController;
use BrainySoft\Payroll\Bank;
use BrainySoft\Payroll\Company;
use BrainySoft\Payroll\User;

use BrainySoft\Http\Controllers\Controller;
/**
 * Class BankController
 * @package Brainysoft\Http\Controllers\Admin
 */

class Bank2Controller extends BaseController
{
    /**
     * @var BankContract
     */
    protected $bankRepository;


    /**
     * BankController constructor.
     * @param BankContract $bankRepository
     */
    public function __construct(BankContract $bankRepository)
    {
        //$this->middleware('auth');
        $this->middleware('role');
        $this->bankRepository = $bankRepository;

    }

    private function company()
    {
      $user = User::find(auth()->user()->id);

      return Company::find($user->company_id);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $banks = $this->bankRepository->listBanks();

        $this->setPageTitle('Banks', 'List of all banks');
        dd('test');
        return view('admin.banks.index', compact('banks'));
    }

    /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function create()
    {
        $this->setPageTitle('Banks', 'Create Bank');
        return view('admin.banks.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',            
        ]);

        $company = $this->company();

        $params = $request->except('_token');

        $params['company_id'] = $company->id;

        $params['country_id'] = $company->country_id;
        
        $bank = $this->bankRepository->createBank($params);

        if (!$bank) {
            return $this->responseRedirectBack('Error occurred while creating bank.', 'error', true, true);
        }
        return $this->responseRedirect('banks.index', 'Bank added successfully' ,'success',false, false);
    }
}
