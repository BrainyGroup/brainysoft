@extends('layouts.master')

@section('title', 'Deduction Types List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        <p>******************************************************************</p>
        <h6>Salary Slip</h6>
        <p>******************************************************************</p>
        <p>{{$company->name}}</p>
        <p>{{$company->logo}}</p>
        <p>company_address</p>
        <p>{{$user->title.' '.$user->firstname.' '.$user->lastname}}</p>
        <p>employee_number</p>
        <p>employee_center</p>
        <p>payment_mode</p>
        <p>designation</p>
        <p>employee_scale</p>
        <p>******************************************************************</p>
        <p>Payments</p>
        <p>******************************************************************</p>
        <p>Basic Salary:..........{{number_format($pay->basic_salary, 2)}}</p>
        <p>SSF:...................{{number_format(($pay->gloss - $pay->taxable), 2)}}</p>
        <p>Allowance:.............{{number_format($pay->allowance, 2)}}</p>
        <p>Gross:.................{{number_format($pay->gloss, 2)}}</p>
        <p>Taxable Earning:.......{{number_format($pay->taxable,2)}}</p>
        <p>Paye:..................{{number_format($pay->paye, 2)}}</p>
        <p>Deduction:.............{{number_format($pay->deduction, 2)}}</p>
        <p>Net Earning:...........{{number_format($pay->net, 2)}}</p>
        <p>******************************************************************</p>




        </div>
    </div>
</div>
@endsection
