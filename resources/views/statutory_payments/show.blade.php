@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ $statutury_payment->name  }}</div>

        <div class="card-body">
           
          <div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered">

                    <caption><h1></h1></caption>



                      <tbody>



                        <tr>

                          <td>{{ __('messages.number') }}</td>

                          <td>{{ $statutury_payment->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $statutury_payment->name }}</td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $statutury_payment->description }}</td>

                    </tr>

                    <tr>
                          <td><a href="/statutury_payments/{{$statutury_payment->id}}/edit">{{ __('messages.edit') }}</a></td>

                          <td><a href=""
                              onclick="
                              var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.statutury_payment')}}');
                              if (result){
                                  event.preventDefault();
                                  document.getElementById({{$statutury_payment->id}}).submit();
                                }">{{ __('messages.delete') }}
                              </a>

                              {!! Form::open(['action' => ['Payroll\StatutoryPaymentController@destroy',$statutury_payment->id],'method' => 'DELETE','id' => $statutury_payment->id]) !!}

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





                         