<?php

namespace BrainySoft\Http\Controllers;

use BrainySoft\Level;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Exception;

use BrainySoft\Company;

use BrainySoft\Employee;

class LevelController extends Controller
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

        Log::debug($company->name.': Start level index');

        $employee = Employee::find(auth()->user()->id);

        $levels = Level::where('company_id', $employee->company_id)->get();

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

      $employee = Employee::find(auth()->user()->id);

      $level = new Level;

      $level->name = request('name');

      $level->description = request('description');

      $level->company_id = $employee->company_id;

      $level->save();

      return redirect('levels');

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
        return view('levels.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
      $level = Level::find($level->id);

      if ($level->delete()){

        return redirect('levels.index')

        ->with('success','Level deleted successfully');

      }else{

        return back()->withInput()->with('error','Level could not be deleted');

      }
    }
}
