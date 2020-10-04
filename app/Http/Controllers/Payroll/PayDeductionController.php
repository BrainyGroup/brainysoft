<?php

namespace BrainySoft\Http\Controllers\Payroll;

use BrainySoft\Payroll\Pay_deduction;

use Illuminate\Http\Request;

use BrainySoft\Http\Controllers\Controller;

class PayDeductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        //$this->middleware('auth');
        $this->middleware('role');

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
     * @param  \BrainySoft\Pay_deduction  $pay_deduction
     * @return \Illuminate\Http\Response
     */
    public function show(Pay_deduction $pay_deduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainySoft\Pay_deduction  $pay_deduction
     * @return \Illuminate\Http\Response
     */
    public function edit(Pay_deduction $pay_deduction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainySoft\Pay_deduction  $pay_deduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pay_deduction $pay_deduction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainySoft\Pay_deduction  $pay_deduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay_deduction $pay_deduction)
    {
        //
    }
}
