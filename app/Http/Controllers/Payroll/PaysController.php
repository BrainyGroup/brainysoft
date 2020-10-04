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

        //$this->middleware('auth');
        $this->middleware('role');

    }
    
	public function index(PaysDataTable $dataTable)
    {
        return $dataTable->render('reports.pays');
    }
}
