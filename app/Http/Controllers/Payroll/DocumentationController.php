<?php

namespace BrainySoft\Http\Controllers\Payroll;

use Illuminate\Http\Request;
use BrainySoft\Http\Controllers\Controller;
use Brainysoft\Payroll\User;
use BrainySoft\Payroll\Employee;
use BrainySoft\Payroll\Company;
use BrainySoft\Payroll\Documentation;
use Illuminate\Support\Facades\Log;

use Exception;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function __construct()
    {

         $this->middleware('permission:documentation-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:documentation-create', ['only' => ['create','store']]);
         $this->middleware('permission:documentation-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:documentation-delete', ['only' => ['destroy']]);

    }
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function company()
    {
      $user = User::find(auth()->user()->id);

      return Company::find($user->company_id);
    }


    public function index()
    {
        $documentations = Documentation::where('id',1)->get();
        return view('documentations.index',compact('documentations'));   
           
    }

    public function login()
    {
       return view('documentations.login');        
    }

    public function home()
    {
       return view('documentations.home');        
    }

    public function user()
    {
       return view('documentations.user');        
    }

    public function employee()
    {
       return view('documentations.employee');        
    }

    public function earning()
    {
       return view('documentations.earning');        
    }

    public function report()
    {
       return view('documentations.report');        
    }

    public function setting()
    {
       return view('documentations.setting');        
    }


    public function user_profile()
    {
       return view('documentations.user_profile');        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documentations.create');  
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

        $des =request('description');

       

        $this->validate(request(),[

            'title' =>'required|string',

            'description' => 'required|string',

           

        ]);

        //get user id

        try{

            $company = $this->company();

            Log::debug($company->name.': Serving documentation model');

        $id = auth()->user()->id;

    // $employee = Employee::find($id);

       $description =  request('description');
 
       $dom = new \DomDocument();
 
       $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
 
       $images = $dom->getElementsByTagName('img');

       foreach($images as $k => $img){
 
 
        $data = $img->getAttribute('src');

        list($type, $data) = explode(';', $data);

        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);

        $image_name= "/storage/summernote/" . time().$k.'.png';

        $path = public_path() . $image_name;

        file_put_contents($path, $data);

        $img->removeAttribute('src');

        $img->setAttribute('src', $image_name);

     }

     $description = $dom->saveHTML();
    

            $documentation = new Documentation;

            $documentation->title = request('title');

            $documentation->author = $id;

            $documentation->description =  $description;

            $documentation->company_id = $company->id;

            $documentation->save();

            Log::debug($company->name.': Documentation model served');

            return back()->with('success','Documentation added successfully');

        }catch(Exception $e){

            $company = $this->company();

            Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

            return back()->withInput()->with('error','Documentation could not be added '.$e->getMessage());

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $documentation = Documentation::where('id', $id)->first();

        return view('documentations.show', compact('documentation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Documentation $documentation)
    {
        return view('documentations.edit',compact('documentation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documentation $documentation)
    {
              //Validation
      $this->validate(request(),[

        

        'description' => 'required|string',

      ]);

      //get user id

      try{

        $company = $this->company();

        Log::debug($company->name.': Updating documentation model');

        $description =  request('description');
 
        $dom = new \DomDocument();
  
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
  
        $images = $dom->getElementsByTagName('img');
 
        foreach($images as $k => $img){
  
  
         $data = $img->getAttribute('src');
 
         list($type, $data) = explode(';', $data);
 
         list(, $data)      = explode(',', $data);
 
         $data = base64_decode($data);
 
         $image_name= "/storage/summernote/" . time().$k.'.png';
 
         $path = public_path() . $image_name;
 
         file_put_contents($path, $data);
 
         $img->removeAttribute('src');
 
         $img->setAttribute('src', $image_name);
 
      }

        $id = auth()->user()->id;

        //$employee = Employee::find($id);

        $documentation = Documentation::where('id',$documentation->id)

                        ->where('company_id', $company->id)

                        ->first();

       $documentation->title = request('title');

       $documentation->author = $id;

       $documentation->description = $description;

       $documentation->company_id = $company->id;

       $documentation->save();

        Log::debug($company->name.': Documentation model served');

        return redirect('documentations')->with('success','Documentation updated successfully');

      }catch(Exception $e){

        $company = $this->company();

        Log::error($company->name.' '.$e->getFile().' '.$e->getMessage().' '.$e->getLine());

        return back()->withInput()->with('error','Documentation could not be updated '.$e->getMessage());

      }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
