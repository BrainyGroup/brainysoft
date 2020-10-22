@extends('layouts.app')
 @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
           
         <span><h1><strong>{{ $statutory_name }} - {{ __('messages.details of payment') }} {{ $max_pay}}</strong></h1></div>
         <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            @if(count($pay_statutories) > 0)
       <div class="table-responsive">
               <table class="table table-hover table-striped table-bordered table-sm" id="sample_1">
                    <caption></caption>
                   <thead>
                    <tr>
                       <th scope="col">#</th>
                       <th scope="col">{{ __('messages.name') }}</th>               
                       <th scope="col">{{ __('messages.pay#') }}</th>     
                       <th scope="col">{{ $statutory_name }} {{ __('messages.number') }}</th>       
                       <th scope="col"><span class="pull-right">{{ __('messages.amount') }}</span></th>
                    </tr>
                  </thead>
                  <tbody>
                    
        @foreach($pay_statutories as $key => $pay)
          
                     <tr>
                       <td>{{ $key + 1 }}</td>
                       <td>{{ $pay->title.'. '.$pay->firstname.' '.$pay->middlename.' '.$pay->lastname }}</td>                
                       <td>{{ $pay->pay_number }}</td>
                       <td>{{ $pay->employee_statutory_no }}</td>
                       
                      <td style="text-align:left" ><span class="pull-right">{{ number_format($pay->total,2) }}</span></td>
                       
                     </tr>

                
           @endforeach

           
         </tbody>

         <tfoot>
   
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>{{ __('messages.total') }} </th>
            <th style="text-align:left"><span class="pull-right">{{ number_format( $total_statutory,2) }}</span></th>
          
          </tr>
      </tfoot>
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
