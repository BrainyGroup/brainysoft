<?php

namespace BrainySoft\Http\Controllers;

use BrainySoft\Kin_type;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Company;

use BrainySoft\Employee;


class KinTypeController extends Controller
{
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{

        $company = $this->company();

        Log::debug($company->name.': Start kin type index');

        $employee = Employee::find(auth()->user()->id);

        $kin_types = Kin_type::where('company_id', $employee->company_id)->get();

        return view('kin_types.index', compact('kin_types'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End kin type index');

      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kin_types.create');
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

        'description' => 'required|string',

      ]);

      $employee = Employee::find(auth()->user()->id);

      $kin_type = new Kin_type;

      $kin_type->name = request('name');

      $kin_type->description = request('description');

      $kin_type->company_id = $employee->company_id;

      $kin_type->save();

      return redirect('kin_types');

    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Kin_type  $kin_type
     * @return \Illuminate\Http\Response
     */
    public function show(Kin_type $kin_type)
    {
        return view('kin_types.show',compact('kin_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Kin_type  $kin_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Kin_type $kin_type)
    {
        return view('kin_types.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Kin_type  $kin_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kin_type $kin_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Kin_type  $kin_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kin_type $kin_type)
    {

      $kin_type = Kin_type::find($kin_type->id);

      if ($kin_type->delete()){

        return redirect('kin_types.index')

        ->with('success','Kin type deleted successfully');

      }else{

        return back()->withInput()->with('error','Kin type could not be deleted');

      }
    }
}
