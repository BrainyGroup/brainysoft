<?php

namespace BrainySoft\Http\Controllers\Payroll;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Center;

use BrainySoft\Payroll\Company;

use BrainySoft\Payroll\Employee;

use BrainySoft\Http\Controllers\Controller;

class CenterController extends Controller
{
    public function __construct()
    {

     

        $this->middleware('auth');
       // $this->middleware('role');

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

            Log::debug($company->name.': Start center index');

            // $employee = Employee::find(auth()->user()->id);

            $centers = Center::where('company_id', $company->id)->get();

            return view('centers.index', compact('centers'));

          }catch(Exception $e){

            $company = $this->company();

            Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

            Log::debug($company->name.': End center index');
          }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         return view('centers.create');

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

      //get user id

      try{

        $company = $this->company();

        Log::debug($company->name.': Serving center model');

        // $id = auth()->user()->id;

        // $employee = Employee::find($id);

        $center = new Center;

        $center->name = request('name');

        $center->number = request('number');

        $center->description = request('description');

        $center->company_id = $company->id;

        $center->save();

        Log::debug($company->name.': Center model served');

        return back()->with('success','Center added successfully');

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        return back()->withInput()->with('error','Center could not be added '.$e->getMessage());

      }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Center $center)
    {
        return view('centers.show',compact('center'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Center $center)
    {
        return view('centers.edit',compact('center'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Center $center)
    {
      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      //get user id

      try{

        $company = $this->company();

        Log::debug($company->name.': Updating center model');

        $id = auth()->user()->id;

        $employee = Employee::find($id);

        $center = Center::where('id',$center->id)

                        ->where('company_id', $company->id)

                        ->first();

        $center->name = request('name');

        $center->number = request('number');

        $center->description = request('description');

        $center->company_id = $company->id;

        $center->save();

        Log::debug($company->name.': Center model served');

        return redirect('centers')->with('success','Center updated successfully');

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        return back()->withInput()->with('error','Center could not be updated '.$e->getMessage());

      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Center $center)
    {

        $center_exist = Employee::where('center_id',$center->id)->exists();

        if (!$center_exist && $center->delete()){

        return redirect('centers')

        ->with('success','Center deleted successfully');

        }else{

        return back()->with('error','Center could not be deleted');
      }
    }
}
