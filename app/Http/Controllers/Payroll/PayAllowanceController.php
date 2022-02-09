<?php

namespace BrainySoft\Http\Controllers\Payroll;

use BrainySoft\Payroll\Pay_allowance;

use Illuminate\Http\Request;

use BrainySoft\Http\Controllers\Controller;

class PayAllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

         $this->middleware('permission:pay_allowance-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:pay_allowance-create', ['only' => ['create','store']]);
         $this->middleware('permission:pay_allowance-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pay_allowance-delete', ['only' => ['destroy']]);

    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \BrainySoft\Pay_allowance  $pay_allowance
     * @return \Illuminate\Http\Response
     */
    public function show(Pay_allowance $pay_allowance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Pay_allowance  $pay_allowance
     * @return \Illuminate\Http\Response
     */
    public function edit(Pay_allowance $pay_allowance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Pay_allowance  $pay_allowance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pay_allowance $pay_allowance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Pay_allowance  $pay_allowance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay_allowance $pay_allowance)
    {
        //
    }
}
