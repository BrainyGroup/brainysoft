@extends('layouts.app')
 @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
           
         <span><h1><strong>{{ $statutory_name }} - Details of Payment for {{ $max_pay}}</strong></h1></div>
         <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            @if(count($pay_statutories) > 0)
       <div class="table-responsive">
               <table class="table table-hover table-striped table-bordered table-sm">
                    <caption></caption>
                   <thead>
                    <tr>
                       <th scope="col">#</th>
                       <th scope="col">Name of Employee</th>               
                       <th scope="col">Pay#</th>     
                       <th scope="col">NSF Number</th>       
                       <th scope="col"><span class="pull-right">Amount</span></th>
                    </tr>
                  </thead>
                  <tbody>
                    
        @foreach($pay_statutories as $key => $pay)
          
                     <tr>
                       <td>{{ $key + 1 }}</td>
                       <td>{{ $pay->title.'. '.$pay->firstname.' '.$pay->middlename.' '.$pay->lastname }}</td>                
                       <td>{{ $pay->pay_number }}</td>
                       <td>{{ $pay->employee_statutory_no }}</td>
                       
                      <td ><span class="pull-right">{{ number_format($pay->total,2) }}</span></td>
                       
                     </tr>

                
           @endforeach

           <tr>
            <td></td>
            <td></td>
            <td>Total (Tsh.)</td>
            <td><span class="pull-right">{{ number_format( $total_statutory,2) }}</span></td>
          
          </tr>
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
