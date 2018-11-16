@extends('layouts.app')
 @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
           
         <span class="pull-right"><h1><strong>{{ $statutory_name }} - Details of Payment for {{ $max_pay}}</strong></h1></div>
         <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            @if(count($pay_statutories) > 0)
       <div class="table-responsive">
               <table class="table table-hover table-striped table-bordered">
                    <caption></caption>
                   <thead>
                    <tr>
                       <th scope="col">#</th>
                       <th scope="col">Name of Employee</th>               
                       <th scope="col">Pay#</th>         
                       <th scope="col">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    
        @foreach($pay_statutories as $pay)
          
                     <tr>
                       <td></td>
                       <td>{{ $pay->title.'. '.$pay->firstname.' '.$pay->middlename.' '.$pay->lastname }}</td>                
                       <td>{{ $pay->pay_number }}</td>
                       
                      <td>{{ number_format($pay->total,2) }}</td>
                       
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
