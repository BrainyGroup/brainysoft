@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">


          
        <span >{{ __('messages.payroll summary') }} {{$max_pay . '        '}}</span>

        <span class="pull-right"> <a class="btn btn-secondary btn-sm" href="/pays/create_previous">{{ __('messages.other pay') }} </a></span>
        
        <span class="pull-right"> <a class="btn btn-primary btn-sm" href="/pays/create">{{ __('messages.add') }} {{ __('messages.new pay') }}</a></span>
      </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

           


        @if(count($pays) > 0)
       
                  <div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered table-sm">
                        <caption></span></caption>

                      <thead>
                        @if($isPosted)
                        <tr class="table-success">
                          <th scope="col">{{ __('messages.name') }}</th>

                          <th scope="col">{{ __('messages.amount') }}</th>

                          <th scope="col">{{ __('messages.paid') }}</th>

                          <th scope="col">{{ __('messages.balance') }}</th>

                          <th scope="col">{{ __('messages.details') }}</th>
       
                       @else
                        <tr class="table-danger">

                          <th scope="col">{{ __('messages.name') }}</th>

                          <th scope="col">{{ __('messages.amount') }}</th>

                          <th scope="col">{{ __('messages.paid') }}</th>

                          <th scope="col">{{ __('messages.balance') }}</th>

                          <th scope="col">{{ __('messages.details') }}</th>
                        @endif         

                        </tr>
                      </thead>
                      <tbody>

                         <tr>
                          <td>{{ __('messages.total') }}</td>

                          <td>{{ number_format($total,2) }}</td>

                          <td></td>

                          <td></td>

                          <td><a href="/reports/pay_details?max_pay={{$max_pay}}">{{ __('messages.details') }}</a></td>
                     </tr>


                        <tr>

                          <td>{{ __('messages.gloss') }}</td>
                          <td>{{ number_format($month_gross,2) }}</td>
                          <td></td>

                          <td></td>
                          <td></td>

                        </tr>
                        <tr>


                          <td>Paye</td>
                          <td>{{ number_format($month_paye,2) }}</td>

                          <td>{{ number_format($month_paye_paid,2) }}</td>

                          <td><a href="/statutory_payments/create?max_pay={{$max_pay}}&statutory_id={{9999}}&statutory_balance={{$month_paye_balance}}">{{ number_format($month_paye_balance,2) }}</a></td>
                           <td><a href="/reports/paye?max_pay={{$max_pay}}">{{ __('messages.details') }}</a></td>

                        </tr>

                        <tr>
                          <td>{{ __('messages.deduction') }}</td>
                          <td>{{ number_format($deduction_sum,2) }}</td>
                          <td></td>

                          <td></td>
                          <td></td>
                        </tr>

                        


                        <tr>
                          <td><a href="/reports/net?max_pay={{$max_pay}}">{{ __('messages.net') }}</a></td>

                          <td>{{ number_format($month_net,2) }}</td>
                        <td>{{ number_format($month_paid,2)}}</td>

                        <td><a href="/reports/net_by_bank?max_pay={{$max_pay}}">{{ number_format($month_net_balance,2)}}</a></td>
                          <td><a href="/reports/net_by_bank?max_pay={{$max_pay}}">{{ __('messages.net by bank') }}</a></td>
                     </tr>

                    

                        
                @foreach($statutories as $statutory)
                        <tr>
                          <td>{{ $statutory->statutory_name }}</td>

                          <td>{{ number_format($statutory->total_amount,2) }}</td>
                          <td>{{ number_format($statutory->total_amount - $statutory->balance ,2) }}</td>

                          @if ($statutory->balance > 0)
                          <td><a href="/statutory_payments/create?max_pay={{$max_pay}}&statutory_id={{$statutory->statutory_id}}&statutory_balance={{$statutory->balance}}">{{ number_format($statutory->balance,2) }}</a></td>
                          @else
                          <td>{{ number_format($statutory->balance,2) }}</td>
                          @endif

                          
                          <td><a href="/reports/statutory_list?max_pay={{$max_pay}}&statutory_id={{$statutory->statutory_id}}">{{ __('messages.details') }}</a></td>
                     </tr>
                @endforeach

                @if($isPosted)
                 <tr class="table-success">
                          <td>{{ __('messages.already posted') }}</td>

                          <td></td>
                          <td></td>

                          <td></td>
                          <td></td>
                     </tr>

                @else

                 <tr class="table-danger">
                          <td class="text-danger" colspan="5">{{ __('messages.do you want to post?') }}
                         
                          <span class = "pull-right">
                           

                          <a class="btn btn-secondary btn-sm" href=""
                          onclick="
                          var result = confirm('Are you sure yo want to post pays for this month?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$max_pay}}).submit();
                            }"> {{ __('messages.yes post') }}
                          </a></span>

                          {!! Form::open(['action' => ['Payroll\PayController@post',$max_pay],'method' => 'PUT','id' => $max_pay]) !!}

                          {!! Form::close() !!}
            
                        </td>
                     </tr>

                @endif



            </tbody>
          </table>
      </div>
        

      


        @else

     

          {{ __('messages.no earning run pay now')}} 

          <a class="pull-right" class="btn btn-secondary btn-sm" href="/pays/create">{{ __('messages.add')}}</a>


        @endif

        </div>
    </div>
</div>    
@endsection




