<?php

namespace BrainySoft\Http\Controllers\Payroll;

use Exception;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Level;

use BrainySoft\Payroll\Company;

use BrainySoft\Payroll\Employee;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use BrainySoft\Http\Controllers\Controller;



class LevelController extends Controller
{
    public function __construct()
    {

        //$this->middleware('auth');
        $this->middleware('role');

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

        Log::debug($company->name.': Start level index');        

        $levels = Level::all();

        return view('levels.index', compact('levels'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End level index');

      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('levels.create');
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

      $level = new Level;

      $level->name = request('name');

      $level->description = request('description');

      $level->company_id = $company->id;

      $level->save();

      return back()->with('success','Level added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        return view('levels.show',compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('levels.edit',compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
      //Validation
      $this->validate(request(),[

        'name' =>'required|string',

        'description' => 'required|string',

      ]);

      $levelUpdate = Level::where('id', $level->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

      ]);

      if($levelUpdate)

        return redirect('levels')

        ->with('success','Level updated successfully');
        //redirect


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
      

        $level_exist = Employee::where('level_id',$level->id)->exists();

        if (!$level_exist && $level->delete()){

        return redirect('levels')

        ->with('success','Level deleted successfully');

      }else{

        return back()->withInput()->with('error','Level could not be deleted');

      }
    }
}
