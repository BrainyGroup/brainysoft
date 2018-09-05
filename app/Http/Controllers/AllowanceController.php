<?php

namespace BrainySoft\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Allowance;

use BrainySoft\Company;

use BrainySoft\Employee;

use BrainySoft\User;

use BrainySoft\Allowance_type;

use DB;

class AllowanceController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function company()
    {
      $employee = Employee::find(auth()->user()->id);

      return Company::find($employee->company_id);
    }



    public function index()
    {

      try{

        $company = $this->company();

        Log::debug($company->name.': Start allowance index');


        $allowance = DB::table('allowances')

        ->select('employee_id','allowance_type_id',

        DB::raw('SUM(amount) as allowance_amount'))

        ->where('allowances.company_id',1)

        ->groupBy('employee_id')

        ->groupBy('allowance_type_id');


          $employees_allowances=DB::table('employees')

          ->join('users','users.id','employees.user_id')

          ->joinSub($allowance,'allowance', function($join){

            $join->on('employees.id','allowance.employee_id');

          })->join('allowance_types','allowance_types.id','allowance.allowance_type_id')

            ->select(

              'employees.*',

              'users.*',

              'allowance.*',

              'allowance_types.name as allowance_name'

              )

            ->get();

          Log::debug($company->name.': End allowance index');

          return view('allowances.index', compact('employees_allowances'));

      }catch(Exception $e){

          $company = $this->company();

          Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          Log::debug($company->name.': End allowance index');
      }




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $employee = Employee::find(request('user_id'));

        $user = User::where('users.id', $employee->user_id)->first();

        $allowance_types = Allowance_type::all();

        return view('allowances.create', compact('allowance_types', 'user'));

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

          'allowance_type_id' => 'required',

          'allowance_amount' =>'required|numeric',

          'start_date' => 'required|date',

          'end_date' => 'required|date',

        ]);


        $employee = Employee::find(request('user_id'));

        $allowance = new Allowance;

        $allowance->employee_id = $employee->id;

        $allowance->company_id = $employee->company_id;

        $allowance->allowance_type_id = request('allowance_type_id');

        $allowance->amount = request('allowance_amount');

        $allowance->start_date = request('start_date');

        $allowance->end_date = request('end_date');

        $allowance->save();

        return redirect('allowances');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Allowance $allowance)
    {
        $allowance = Allowance::find($allowance->id);
        return view('allowances.show',compact('allowance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allowance = Allowance::find($allowance->id);
        return view('allowances.edit',compact('allowance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allowance $allowance)
    {
            //save data
        $allowanceUpdate = Allowance::where('id', $allowance->id)

        ->update([

            'name'			=> $request->input('name'),

            'description'	=> $request->input('description'),

        ]);

        if($allowanceUpdate)

          return redirect()->route('allowances.show',['Allowance'=>$allowance->id])

          ->with('success','Allowance updated successfully');
          //redirect
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allowance $allowance)
    {

          if ($allowance->delete()){

          return redirect('allowances.index')

          ->with('success','Allowance deleted successfully');

        }else{

          return back()->withInput()->with('error','Allowance could not be deleted');

        }

    }
}
