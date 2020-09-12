@extends('layouts.app')
 @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
           
         <span><h1>Net pay for {{ $bank_name }} </h1></div>
         <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
       <div class="table-responsive">
               <table class="table table-hover table-striped table-bordered table-sm">
                    <caption></caption>
                   <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                       <th scope="col">Name</th>
                       <th scope="col">Account#</th>
                       <th scope="col"><span class = "pull-right">Amount</span></th>
                       <th scope="col"><span class = "pull-right">Paid</span></th>
                       <th scope="col"><span class = "pull-right">Balance</span></th>
                     </tr>
                  </thead>
                  <tfoot class="thead-dark">
                    <tr>
                   <th></th>
                   <th colspan="2">Total</th>
                 <th><span class = "pull-right">{{ number_format($net_total,2)}}</span></th>
                 <th><span class = "pull-right">{{ number_format($net_paid,2) }}</span></th> 
                 <th><span class = "pull-right">{{ number_format($net_balance,2) }}</span></th>
                    </tr> 
                  </tfoot>
                  <tbody>
        @if(count($net_list_by_banks)>0)
         @foreach($net_list_by_banks as $key => $net)
                     <tr>
                      <td>{{ $key + 1}}</td>
                       <td>{{ $net->title.'. '.$net->firstname.' '.$net->middlename.' '.$net->lastname }}</td>                   
                       <td>{{ $net->account_number }}</td>
                       <td><span class = "pull-right">{{ number_format($net->net,2) }}</span></td>  
                       <td><span class = "pull-right">{{ number_format($net->net - $net->net_balance,2) }}</span></td> 
                       <td><span class = "pull-right">{{ number_format($net->net_balance,2) }}</span></td>               
                     </tr>
           @endforeach

         </tbody>

      </table>
  </div>
         @else
           No Earning, run pay now
           <a class="pull-right" href="/pays/create">{{ __('messages.add')}}</a>
         @endif
         </div>
    </div>
</div>    
@endsection
