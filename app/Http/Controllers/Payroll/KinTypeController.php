<?php

namespace BrainySoft\Http\Controllers;

use Exception;

use BrainySoft\Kin;

use BrainySoft\User;

use BrainySoft\Company;

use BrainySoft\Kin_type;

use BrainySoft\Employee;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;



// TODO: create kin types seeder


class KinTypeController extends Controller
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

        Log::debug($company->name.': Start kin type index');        

        $kin_types = Kin_type::where('company_id', $company->id)->get();

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

      $company = $this->company();

      $kin_type = new Kin_type;

      $kin_type->name = request('name');

      $kin_type->description = request('description');

      $kin_type->company_id = $company->id;

      $kin_type->save();

      return back()->with('success','Kin types added successfully');

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
        return view('kin_types.edit',compact('kin_type'));
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
      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      $kin_typeUpdate = Kin_type::where('id', $kin_type->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

      ]);

      if($kin_typeUpdate)

        return redirect('kin_types')

        ->with('success','Kin_type updated successfully');
        //redirect
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Kin_type  $kin_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kin_type $kin_type)
    {

        $kin_type_exist = Kin::where('kin_type_id',$kin_type->id)->exists();

        if (!$kin_type_exist && $kin_type->delete()){

        return redirect('kin_types')

        ->with('success','Kin type deleted successfully');

      }else{

        return back()->withInput()->with('error','Kin type could not be deleted');

      }
    }
}
