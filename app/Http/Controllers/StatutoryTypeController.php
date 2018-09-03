<?php

namespace BrainySoft\Http\Controllers;

use BrainySoft\Statutory_type;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Company;

class StatutoryTypeController extends Controller
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

        Log::debug($company->name.': Start statutory type index');

        $employee = Employee::find(auth()->user()->id);

        $statutory_types = Statutory_type::where('company_id', $employee->company_id)->get();

        return view('statutory_types.index', compact('statutory_types'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End statutory type index');

      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('statutory_types.create');
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

      $statutory_type = new Statutory_type;

      $statutory_type->name = request('name');

      $statutory_type->description = request('description');

      $statutory_type->company_id = $employee->company_id;

      $statutory_type->save();

      return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Statutory_type  $statutory_type
     * @return \Illuminate\Http\Response
     */
    public function show(Statutory_type $statutory_type)
    {
        return view('statutory_types.show',compact('Statutory_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Statutory_type  $statutory_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Statutory_type $statutory_type)
    {
        return view('statutory_types.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Statutory_type  $statutory_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statutory_type $statutory_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Statutory_type  $statutory_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statutory_type $statutory_type)
    {

      $statutory_type = Statutory_type::find($statutory_type->id);

      if ($statutory_type->delete()){

        return redirect('statutory_types.index')

        ->with('success','Statutory type deleted successfully');

      }else{

        return back()->withInput()->with('error','Statutory type could not be deleted');

      }

    }
}
