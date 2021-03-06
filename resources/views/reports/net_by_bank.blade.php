@extends('layouts.app')
 @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
           
         <span><h1>{{ __('messages.net pay by bank')}} </h1></div>
         <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
       <div class="table-responsive">
               <table class="table table-hover table-striped table-bordered table-sm" id="sample_1">
                    <caption></caption>
                   <thead>
                    <tr>
                      <th scope="col">#</th>
                     
                       <th scope="col">{{ __('messages.bank')}} </th>                    
                       <th scope="col"><span class = "pull-right">{{ __('messages.amount')}} </span></th>
                       <th scope="col"><span class = "pull-right">{{ __('messages.paid')}} </span></th>                    
                       <th scope="col"><span class = "pull-right">{{ __('messages.balance')}} </span></th>
                       <th scope="col">{{ __('messages.details')}} </th>
                     </tr>
                  </thead>

                  <tfoot>
                    <tr>
                   <th></th>
                   <th>{{ __('messages.total')}} </th>
                 <th><span class = "pull-right">{{ number_format($net_total,2)}}</span></th>
                 <th><span class = "pull-right">{{ number_format($net_paid,2) }}</span></th> 
                 <th><span class = "pull-right">{{ number_format($net_total - $net_paid,2) }}</span></th>
                 <th></th>
                    </tr> 
                  </tfoot>
                  <tbody>
        @if(count($net_by_banks)>0)
         @foreach($net_by_banks as $key => $net)
                     <tr>

                      <td>{{ $key + 1 }}</td>                      
                      
                       <td>{{ $net->bank_name }}</td>
                      
                       <td><span class = "pull-right">{{ number_format($net->bank_amount,2) }}</span></td>

                       <td><span class = "pull-right">{{ number_format($net->bank_amount - $net->net_balance,2) }}</span></td>

                       <td><span class = "pull-right">{{ number_format($net->net_balance,2) }}</span></td>

                        <td><a href="/reports/net_list_by_bank?max_pay={{$max_pay}}&bank_id={{$net->bank_id}}">{{ __('messages.bank list')}} </a></td>                
                     </tr>
           @endforeach
         
         </tbody>
      </table>
  </div>
         @else
         {{ __('messages.no earning run pay now')}}  
           <a class="pull-right"  class="btn btn-secondary btn-sm" href="/pays/create">{{ __('messages.add')}}</a>
         @endif
         </div>
    </div>
</div>    
@endsection