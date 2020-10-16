@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Settings</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


             <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">

            
                  <caption><h1></h1></caption>


                  <tbody>

                    <tr>
                      <td><a href="/reports/pay_details?max_pay={{$max_pay}}">Current Month</a></td>
                      <td><a href="/reports/pay_details">This year</a></td>
                      <td><a href="/reports/employee_pay">Employee pay</a></td>
                    </tr>

                    <tr>
                      <td><a href="/reports/monthly_create">Monthly</a></td>
                      <td><a href="/reports/yearly_create">Yearly</a></td>
                      <td><a href="/employees/{{ $employee_id}}">Employee Details</a></td>
                    </tr>

                    <tr>
                      <td><a href="/reports/paye_yearly_create">Paye yearly</a></td>
                      <td><a href="/levels">Levels</a></td>
                      <td><a href="/reports/statutory_employee_all_create">Statutory employee</a></td>
                    </tr>

                    <tr>
                      <td><a href="/reports/paye_all">Paye all</a></td>
                      <td><a href="/reports/statutory_yearly_create">Statutory yearly</a></td>
                      <td><a href="/reports/statutory_all_create">Statutory all</a></td>

                    </tr>

  
        </tbody>
      </table>
  </div>

        </div>
    </div>
</div>    
@endsection




