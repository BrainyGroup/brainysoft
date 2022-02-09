<?php

namespace BrainySoft\Http\Controllers\Payroll;

use BrainySoft\DataTables\PaysDataTable;

use Illuminate\Http\Request;
// use BrainySoft\Http\Controllers\Controller;
use BrainySoft\Http\Controllers\Controller;


class PaysController extends Controller
{
    public function __construct()
    {

         $this->middleware('permission:pays-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:pays-create', ['only' => ['create','store']]);
         $this->middleware('permission:pays-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pays-delete', ['only' => ['destroy']]);

    }
    
	public function index(PaysDataTable $dataTable)
    {
        return $dataTable->render('reports.pays');
    }
}
