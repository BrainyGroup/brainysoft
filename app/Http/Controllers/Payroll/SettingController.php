<?php

namespace BrainySoft\Http\Controllers\Payroll;

use Exception;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Company;

use BrainySoft\Payroll\Setting;

use BrainySoft\Payroll\Employee;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use BrainySoft\Http\Controllers\Controller;


class SettingController extends Controller
{
  public function __construct()
  {

         $this->middleware('permission:setting-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:setting-create', ['only' => ['create','store']]);
         $this->middleware('permission:setting-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setting-delete', ['only' => ['destroy']]);

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

       

        Log::debug($company->name.': Start setting index');

        //$employee = Employee::find(auth()->user()->id);

        $settings = Setting::where('company_id', $company->id)->get();

        return view('settings.index', compact('settings'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End setting index');

      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.create');
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

      $setting = new Setting;

      $setting->name = request('name');

      $setting->description = request('description');

      $setting->company_id = $company->id;

      $setting->save();

      return back()->with('success','Setting added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        return view('settings.show',compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
          return view('settings.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      $settingUpdate = Setting::where('id', $id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

      ]);

      if($settingUpdate)

        return redirect('settings')

        ->with('success','Setting updated successfully');
        //redirect


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {

      if ($setting->delete()){

        return redirect('settings')

        ->with('success','Setting deleted successfully');

      }else{

        return back()->withInput()->with('error','Setting could not be deleted');

      }
    }
}
