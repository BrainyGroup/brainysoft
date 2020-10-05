<?php

namespace BrainySoft\Http\Controllers\Payroll;

use BrainySoft\DataTables\UsersDataTable;

use Exception;



use App\ImageModel;


use Image;

use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\Hash;

use BrainySoft\Http\Resources\UserResource;



use BrainySoft\Payroll\User;

use BrainySoft\Payroll\Company;

use BrainySoft\Payroll\Employee;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use BrainySoft\Http\Controllers\Controller;


class UserController extends Controller
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

        Log::debug($company->name.': Start user index');

        // $user = User::find(auth()->user()->id); 

   

        // $users = User::where('company_id',$company->id)
        // ->where('employee',false)
        // ->get();  
        
        $users = User::where('company_id',$company->id)->get();   
        
       

        return view('users.index', compact('users','company'));

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        Log::debug($company->name.': End user index');

      }


    }

      public  function getUsers(Request $request){

          if ( $request->input('showdata') ) {
            return User::orderBy('created_at', 'desc')->get();
          }

          $columns = ['name', 'email', 'created_at'];

          $length = $request->input('length');

          $column = $request->input('column');

          $search_input = $request->input('search');

          $query = User::select('name', 'email', 'created_at');          
          //->orderBy($columns[$column]);
          
          if ($search_input) {
          $query->where(function($query) use ($search_input) {
          $query->where('name', 'like', '%' . $search_input . '%')
          ->orWhere('email', 'like', '%' . $search_input . '%')
          ->orWhere('created_at', 'like', '%' . $search_input . '%');
          });
          }

          $users = $query->paginate($length);

          return ['data' => $users];
        }

      public function deleteUser(User $user) {
        if($user) {
        $user->delete();
        }
        return 'user deleted';
      }
      

    public function getUsersForDataTable(Request $request)
    {
      
        $query = User::where('employee', false)->orderBy('employee', $request->order);
        $users = $query->paginate($request->per_page);
  
     
        return UserResource::collection($users);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
      $validation = $this->validate(request(),[

        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',


        'title' =>'required|string',

        'name' => 'required|string',

        'sex' =>'required|string',

        'maritalstatus' => 'required|string',

        'firstname' =>'required|string',

        'middlename' => 'required|string',

        'lastname' =>'required|string',
        

       
        

        // 'photo' => 'required|string',

        'dob' =>'required|date',

        'mobile' => 'required|string',

      ]);

       $company = $this->company();


          $user = new User;

          $user->name = request('name');

          $user->email = request('email');

          $user->password = Hash::make(request('password'));

          $user->company_id = $company->id;

          $user->title            = request('title');        

          $user->sex           = request('sex');

          $user->maritalstatus = request('maritalstatus');

          $user->firstname           = request('firstname');

          $user->middlename = request('middlename');

          $user->lastname         = request('lastname');

          $user->national_id         = request('national_id');         

          $user->dob          = request('dob');

          $user->mobile = request('mobile');

          $user->employee = false;

          $user->save();  
     

        return redirect('users')

        ->with('success','User updated successfully');
        //redirect
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
         //Validation
      $validation = $this->validate(request(),[

        'title' =>'required|string',

        'name' => 'required|string',

        'sex' =>'required|string',

        'maritalstatus' => 'required|string',

        'firstname' =>'required|string',

        'middlename' => 'required|string',

        'lastname' =>'required|string',

        'photo' => 'file|image|mimes:jpeg,png,gif,webp|nullable|max:1999',
        

        // 'photo' => 'required|string',

        'dob' =>'required|date',

        'mobile' => 'required|string',

      ]);

      $filename = null;


       // $filename = $img = Image::canvas(100, 115, '#ccc');

      if($request->hasFile('photo')) {

           $file      = $validation['photo']; // get the validated file

           $extension = $file->getClientOriginalExtension();

           $filename  = strtolower($user->id . '.' . $extension);     

           $exists = Storage::disk('local')->exists('user_profile_photos' . $user->photo);



           if( (strtolower($user->photo) != strtolower($filename)) && $exists ){


            Storage::delete('user_profile_photos' . $user->photo);
            

            Image::make($validation['photo'])->resize(100, 115)->save(
               'storage/user_profile_photos/'.$filename);

            // $path      = $file->storeAs('public/user_profile_photos', $filename);       

            }else{

         Image::make($validation['photo'])->resize(100, 115)->save(
                'storage/user_profile_photos/'.$filename);

             // $path      = $file->storeAs('public/user_profile_photos', $filename);

            }
        }

        

       



      $userUpdate = User::where('id', $user->id)

      ->update([

          'title'            =>$request->input('title'),

          'name' =>$request->input('name'),

          'sex'            =>$request->input('sex'),

          'maritalstatus' =>$request->input('maritalstatus'),

          'firstname'            =>$request->input('firstname'),

          'middlename' =>$request->input('middlename'),

          'lastname'            =>$request->input('lastname'),

          'photo' => $filename,

          'dob'            =>$request->input('dob'),

          'mobile' =>$request->input('mobile'),

      ]);

      if($userUpdate)

        return redirect('users')

        ->with('success','User updated successfully');
        //redirect
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // TODO: do not delete user unless does not have any pay and delete cascade
// TODO: delete user with all related items
      

      $employee_exist = Employee::where('user_id',$user->id)->exists();

      $user = User::find(auth()->user()->id);

      $loginUser = User::where('id', auth()->user()->id)->exists();

      if (!$loginUser && !$employee_exist && $user->delete()){

          return redirect('users.index')

          ->with('success','User deleted successfully');

        }else{

          return back()->withInput()->with('error','User could not be deleted');

        }
    }
}
