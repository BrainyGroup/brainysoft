<?php

namespace BrainySoft\Http\Controllers\Payroll;



use BrainySoft\DataTables\UsersDataTable;

use Illuminate\Http\Request;

use BrainySoft\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
  
         $this->middleware('permission:user-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]); 
  
    }
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('reports.users');
    }
}
