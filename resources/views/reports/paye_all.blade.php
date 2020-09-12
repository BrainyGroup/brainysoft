
@extends('layouts.app')
 @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <span><h1>Paye for all Years</h1></span>
           
         </div>
         <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            @if(count($paye_all) > 0)
       <div class="table-responsive">
               <table class="table table-hover table-striped table-bordered table-sm" id="sample_1">
                    <span></span>
                   <thead>
            
                    <tr>
                      <th scope="col" >No</th>  
                      <th scope="col" >Year</th>                     
                       <th scope="col" >Month</th>                      
                       <th scope="col">Amount</th>
                       <th scope="col">Balance</th>                  
      
                     </tr>
                  </thead>
                  <tbody>
           
        
        @foreach($paye_all as $key => $paye_monthly)
          
                     <tr>                   
                      <td>{{ $key+1 }}</td>
                      <td>{{ $paye_monthly->year }}</td>
                       <td>{{ $months[$paye_monthly->month - 1] }}</td>
                       <td>{{ number_format($paye_monthly->paye_amount,2) }}</td>
                       <td>{{ number_format($paye_monthly->paye_balance,2) }}</td>

                       
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
