@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.settings')}}</div>

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
                      <td><a href="/reports/pay_details?max_pay={{$max_pay}}">{{ __('messages.current month')}}</a></td>
                      <td><a href="/reports/pay_details">{{ __('messages.this year')}}</a></td>
                      <td><a href="/reports/employee_pay">{{ __('messages.employee pay')}}</a></td>
                    </tr>

                    <tr>
                      <td><a href="/reports/monthly_create">{{ __('messages.monthly')}}</a></td>
                      <td><a href="/reports/yearly_create">{{ __('messages.yearly')}}</a></td>
                      <td><a href="/employees/{{ $employee_id}}">{{ __('messages.employee details')}}</a></td>
                    </tr>

                    <tr>
                      <td><a href="/reports/paye_yearly_create">{{ __('messages.paye yearly')}}</a></td>
                      <td><a href="/levels">Levels</a></td>
                      <td><a href="/reports/statutory_employee_all_create">{{ __('messages.employee statutory')}}</a></td>
                    </tr>

                    <tr>
                      <td><a href="/reports/paye_all">{{ __('messages.paye all')}}</a></td>
                      <td><a href="/reports/statutory_yearly_create">{{ __('messages.statutory yearly')}}</a></td>
                      <td><a href="/reports/statutory_all_create">{{ __('messages.all statutory')}}</a></td>

                    </tr>

  
        </tbody>
      </table>
  </div>

        </div>
    </div>
</div>    
@endsection




