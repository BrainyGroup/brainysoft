@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header"><h1><strong>Reports</strong></h1></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


             <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">

            
                  <caption><h1></h1></caption>


                  <tbody>

                    <tr>
                      <td><a href="/reports/current_pay">Current Pay</a></td>
                      <td><a href="/reports/monthly_create">Monthly Pay</a></td>
                      <td><a href="/centers">Yearly Pay</a></td>
                    </tr>

                    <tr>
                      <td><a href="/deduction_types">Current Paye</a></td>
                      <td><a href="/departments">Monthly Paye</a></td>
                      <td><a href="/designations">Yearly Paye</a></td>
                    </tr>

                    <tr>
                      <td><a href="/kin_types">Current Statutories</a></td>
                      <td><a href="/levels">Monthly Statutories</a></td>
                      <td><a href="/organizations">Yearly Statutories</a></td>
                    </tr>

                    <tr>
                      <td><a href="/payes">Current Deductions</a></td>
                      <td><a href="/salary_bases">Monthly Deductions</a></td>
                      <td><a href="/scales">Yearly Deductions</a></td>

                    </tr>

                    <tr>
                      <td><a href="/employment_types">Employment types</a></td>
                      <td><a href="/pay_types">Pay types</a></td>
                      <td><a href="/payroll_groups">Payroll Groups</a></td>
                    </tr>

                    

                    <tr>
                      <td><a href="/statutory_types">Statutory types</a></td>
                      <td><a href="/statutories">Statutories</a></td>
                      <td><a href="/countries">Countries</a></td>
                    </tr>

                    <tr>
                      <td><a href="/other_settings">Other settings</a></td>
                      <td><a href="/companies">Companies</a></td>
                      <td><a href="/countries">Countries</a></td>
                    </tr>
        </tbody>
      </table>
  </div>

        </div>
    </div>
</div>    
@endsection




