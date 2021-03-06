@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">


          

        <span><h1>{{ __('messages.net pay')}} {{ $company->name}}</h1></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

           



      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm" id="sample_1" >
                    <caption></caption>

                  <thead>
                    <tr>
                      <th scope="col">#</th>

                      <th scope="col">{{ __('messages.name')}}</th>

                      <th scope="col">{{ __('messages.bank')}}</th>

                      <th scope="col">{{ __('messages.account#')}}</th>

                      <th scope="col"><span class = "pull-right">{{ __('messages.amount')}}</span></th>

                      <th scope="col"><span class = "pull-right">{{ __('messages.paid')}}</span></th>

                      <th scope="col"><span class = "pull-right">{{ __('messages.balance')}}</span></th>
                      

                    </tr>
                  </thead>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th colspan="3">Total</th>
                  <th><span class = "pull-right">{{ number_format($net_total,2)}}</span></th>
                  <th><span class = "pull-right">{{ number_format($net_paid,2) }}</span></th> 
                  <th><span class = "pull-right">{{ number_format($net_balance,2) }}</span></th> 
        
                  </tr>
                  </tfoot>
                  <tbody>
        @if(count($nets)>0)

        @foreach($nets as $key => $net)

                    <tr>
                    <td>{{ $key+1}}</td>
                

                      <td>{{ $net->title.'. '.$net->firstname.' '.$net->middlename.' '.$net->lastname }}</td>          

                    <td>{{ $net->bank_name}}</td>

                    <td>{{$net->account_number}}</td>

                      <td><span class = "pull-right">{{ number_format($net->net,2) }}</span></td>    
                      
                      <td><span class = "pull-right">{{ number_format($net->net - $net->net_balance,2) }}</span></td>   

                      <td><span class = "pull-right"><a href="/employee_payments/create?employee_id={{$net->employee_id}}&pay_number={{$net->pay_number}}&employee_balance={{$net->net_balance}}">{{ number_format($net->net_balance,2) }}</a></span></td>   
                    </tr>
          @endforeach

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




