<?php

namespace BrainySoft\Http\Controllers;



use Exception;

use BrainySoft\User;

use BrainySoft\Company;

use BrainySoft\Employee;

use Illuminate\Http\Request;

use BrainySoft\Statutory_type;

use Illuminate\Support\Facades\Log;

class StatutoryTypeController extends Controller
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

        $statutory_types = Statutory_type::where('company_id', $company->id)->get();

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

      $company = $this->company();

      $statutory_type = new Statutory_type;

      $statutory_type->name = request('name');

      $statutory_type->description = request('description');

      $statutory_type->company_id = $company->id;

      $statutory_type->save();

     return back()->with('success','Statutory type added successfully');

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
        return view('statutory_types.edit',compact('statutory_type'));
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
      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      $statutory_typeUpdate = Statutory_type::where('id', $statutory_type->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

      ]);

      if($statutory_typeUpdate)

        return redirect('statutory_types')

        ->with('success','Statutory_type updated successfully');
        //redirect

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Statutory_type  $statutory_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statutory_type $statutory_type)
    {

        $statutory_type_exist = Statutory::where('statutory_type_id',$statutory_type->id)->exists();

        if (!$statutory_type_exist && $statutory_type->delete()){

        return redirect('statutory_types')

        ->with('success','Statutory type deleted successfully');

      }else{

        return back()->withInput()->with('error','Statutory type could not be deleted');

      }

    }
}
