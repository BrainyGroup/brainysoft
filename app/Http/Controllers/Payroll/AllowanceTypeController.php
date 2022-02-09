<?php

namespace BrainySoft\Http\Controllers\Payroll;


use Exception;

use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Company;

use BrainySoft\Payroll\Employee;

use Illuminate\Http\Request;

use BrainySoft\Payroll\Allowance_type;

use BrainySoft\Payroll\Allowance;

use Illuminate\Support\Facades\Log;

use BrainySoft\Http\Controllers\Controller;


class AllowanceTypeController extends Controller
{

    public function __construct()
    {

         $this->middleware('permission:allowance_type-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:allowance_type-create', ['only' => ['create','store']]);
         $this->middleware('permission:allowance_type-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:allowance_type-delete', ['only' => ['destroy']]);

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

        Log::debug($company->name.': Start allowance index');

        //$employee = Employee::find(auth()->user()->id);

        $allowance_types = Allowance_type::all();

        

        return view('allowance_types.index' ,compact('allowance_types'));

      }catch(Exception $e){

          $company = $this->company();

          Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

          Log::debug($company->name.': End allowance types index');
      }


    }

    public function indexAPI(Request $request){
      
        $allowance_types = Allowance_type::latest()->orderBy('created_at', 'desc')->get();

        dd($allowance_types);

        return response()->json( $allowance_types);
        
        $columns = ['id', 'name', 'description'];
        $length = $request->input('length');
        $column = $request->input('column');
        $search_input = $request->input('search');
        $query = Allowance_type::select('id', 'name', 'description')
        ->orderBy($columns[$column]);
        if ($search_input) {
        $query->where(function($query) use ($search_input) {
        $query->where('id', 'like', '%' . $search_input . '%')
        ->orWhere('name', 'like', '%' . $search_input . '%')
        ->orWhere('description', 'like', '%' . $search_input . '%');
        });
        }
        $users = $query->paginate($length);
        return ['data' => $users];
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('allowance_types.create');

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

      $company = $this->company();
      //save records

      $allowance_type = new Allowance_type;

      $allowance_type->name = request('name');

      $allowance_type->description = request('description');

      $allowance_type->company_id = $company->id;

      $allowance_type->save();

      //redirect to allowance types     

      return back()->with('success','Allowance type added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Allowance_type  $allowance_type
     * @return \Illuminate\Http\Response
     */
    public function show(Allowance_type $allowance_type)
    {
        return view('allowance_types.show',compact('allowance_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Allowance_type  $allowance_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Allowance_type $allowance_type)
    {
        return view('allowance_types.edit', compact('allowance_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Allowance_type  $allowance_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allowance_type $allowance_type)
    {
      $allowanceTypeUpdate = Allowance_type::where('id', $allowance_type->id)

      ->update([

          'name'			=>$request->input('name'),

          'description'	=>$request->input('description'),

      ]);

      if($allowanceTypeUpdate)

        return redirect('allowance_types')

        ->with('success','Allowance type updated successfully');
        //redirect
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Allowance_type  $allowance_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allowance_type $allowance_type)
    {

      $allowance_types_exist = Allowance::where('allowance_type_id',$allowance_type->id)->exists();

      if (!$allowance_types_exist && $allowance_type->delete()){

        return redirect('allowance_types')

        ->with('success','Allowance type deleted successfully');

      }else{

        return back()->withInput()->with('error','Allowance type could not be deleted');

      }
    }
}
