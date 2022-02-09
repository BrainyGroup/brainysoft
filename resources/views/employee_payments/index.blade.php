@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.employee_payment') }} <span class="pull-right"> 
           @can('employee_payment-create') 
             <a  class="btn btn-secondary btn-sm"  href="/employee_payments/create">{{ __('messages.add') }}</a>
           @endcan
            </span></div>

        <div class="card-body">
            @if( count($employee_payments) > 0 )
      <div class="table-responsive">


              <table class="table table-hover table-striped table-bordered table-sm">
                  <caption></caption>

                  <thead>
                    <tr>

                      <th scope="col">{{ __('messages.name') }}</th>
                      <th scope="col">{{ __('messages.description') }}</th>
                      <th scope="col">{{ __('messages.edit') }}</th>
                      <th scope="col">{{ __('messages.delete') }}</th>



                    </tr>
                  </thead>
                  <tbody>
        @foreach($employee_payments as $employee_payment)

                    <tr>




                      <td><a href="/employee_payments/{{$employee_payment->id}}">{{ $employee_payment->name }}</a></td>

                      <td><a href="/employee_payments/{{$employee_payment->id}}">{{ $employee_payment->description}}</a></td>

                      <td>
                        @can('employee_payment-edit') 
                        <a href="/employee_payments/{{$employee_payment->id}}/edit">{{ __('messages.edit') }}</a></td>
                        @endcan


                    <td>
                      @can('employee_payment-delete') 
                      <a href=""
                        onclick="
                        var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.employee_payment')}}');
                        if (result){
                            event.preventDefault();
                            document.getElementById({{$employee_payment->id}}).submit();
                          }">{{ __('messages.delete') }}
                        </a>

                        {!! Form::open(['action' => ['Payroll\EmployeePaymentController@destroy',$employee_payment->id],'method' => 'DELETE','id' => $employee_payment->id]) !!}
                      @endcan
                        {!! Form::close() !!}
                    </td>

                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No employee_payment defined

        @can('employee_payment-create') 

          <a class="pull-right" href="/employee_payments/create">{{ __('messages.add')}}</a>

        @endcan
        @endif
        </div>
    </div>
</div>    
@endsection

