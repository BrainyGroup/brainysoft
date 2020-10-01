<?php

namespace BrainySoft\Http\Controllers;



use BrainySoft\DataTables\UsersDataTable;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
  
        //$this->middleware('auth');
        $this->middleware('role');
  
    }
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('reports.users');
    }
}
