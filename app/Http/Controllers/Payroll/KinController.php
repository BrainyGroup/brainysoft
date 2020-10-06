<?php

namespace BrainySoft\Http\Controllers\Payroll;

use Illuminate\Support\Facades\DB;

use Exception;

use BrainySoft\Payroll\Kin;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Company;

use BrainySoft\Payroll\Employee;

use BrainySoft\Payroll\Kin_type;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use BrainySoft\Http\Controllers\Controller;



class KinController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        //$this->middleware('role');

    }

    private function company()
    {
      $user = User::find(auth()->user()->id);

      return Company::find($user->company_id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $company = $this->company();

        Log::debug($company->name.': Start kin index');        

        $kins = DB::table('kin')

        ->where('kin.company_id', $company->id)

        ->where('employee_id',request('employee_id'))

        ->join('employees','employees.id','kin.employee_id')

        ->join('users','users.id','employees.user_id')



        ->join('kin_types','kin_types.id','kin.kin_type_id')

        ->select(

          'employees.*',

          'users.*',

          'kin.*',

          'kin_types.name as kin_type_name'

          )

        ->get();

        return view('kins.index', compact('kins','users'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $employee = Employee::find(request('employee_id'));

        $user = User::where('id', $employee->user_id)->first();

        $kin_types = Kin_type::all();

        return view('kins.create', compact('user','kin_types'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'mobile' => 'required|string',

        'kin_type_id' =>'required|numeric',

        'employee_id' => 'required|numeric',

      ]);

      

      $company = $this->company();

      $kin = new Kin;

      $kin->name = request('name');

      $kin->mobile = request('mobile');

      $kin->kin_type_id = request('kin_type_id');

      $kin->employee_id = request('employee_id');

      $kin->company_id = $company->id;

      $kin->save();

      //return back()->with('success','Kin added successfully');


      return redirect()->route('kins.index',['employee_id' => request('employee_id')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function show(Kin $kin)
    {
        return view('kins.show',compact('kin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function edit(Kin $kin)
    {
        $kin_types = Kin_type::all();

        $current_kin_type = Kin_type::find($kin->kin_type_id);

        return view('kins.edit',compact('kin','current_kin_type','kin_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kin $kin)
    {
      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'mobile' => 'required|string',

        'kin_type_id' =>'required|numeric',



      ]);

      $kinUpdate = Kin::where('id', $kin->id)

      ->update([

          'name'			=>$request->input('name'),

          'mobile'	=>$request->input('mobile'),

          'kin_type_id'			=>$request->input('kin_type_id'),





      ]);

      if($kinUpdate)

      return redirect()->route('kins.index',['employee_id' => $kin->employee_id])

        ->with('success','Kin updated successfully');
        //redirect


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Kin  $kin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kin $kin)
    {


      if ($kin->delete()){

      return redirect()->route('kins.index',['employee_id' => $kin->employee_id])

        ->with('success','Kin deleted successfully');

      }else{

        return back()->withInput()->with('error','Kin could not be deleted');

      }
    }
}
