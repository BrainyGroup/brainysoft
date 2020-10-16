@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.statutury_payment') }} <span class="pull-right"> <a class="btn btn-secondary btn-sm" href="/statutury_payments/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if( count($statutury_payments) > 0 )
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
        @foreach($statutury_payments as $statutury_payment)

                    <tr>




                      <td><a href="/statutury_payments/{{$statutury_payment->id}}">{{ $statutury_payment->name }}</a></td>

                      <td><a href="/statutury_payments/{{$statutury_payment->id}}">{{ $statutury_payment->description}}</a></td>

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


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No statutury_payment defined

          <a class="pull-right" href="/statutury_payments/create">{{ __('messages.add')}}</a>


        @endif
        </div>
    </div>
</div>    
@endsection

