@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ $employee_payment->name  }}</div>

        <div class="card-body">
           
          <div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered">

                    <caption><h1></h1></caption>



                      <tbody>



                        <tr>

                          <td>{{ __('messages.number') }}</td>

                          <td>{{ $employee_payment->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $employee_payment->name }}</td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $employee_payment->description }}</td>

                    </tr>

                    <tr>
                          <td>
                            @can('employee_payment-edit') 
                              <a href="/employee_payments/{{$employee_payment->id}}/edit">{{ __('messages.edit') }}</a>
                            @endcan
                            </td>

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



                                          </tr>




                              </tbody>
                            </table>
                        </div>
        </div>
    </div>
</div>    
@endsection





                         