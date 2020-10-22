
@extends('layouts.app')
 @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <span><h1>{{ __('messages.paye for') }} {{$year}}</h1></span>
           
         </div>
         <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            @if(count($paye_yearly) > 0)
       <div class="table-responsive">
               <table class="table table-hover table-striped table-bordered table-sm" id="sample_1">
                    <span></span>
                   <thead>
            
                    <tr>
                      <th scope="col" >#</th>  
                     
                       <th scope="col" >{{ __('messages.month') }}</th>   

                       <th scope="col">{{ __('messages.amount') }}</th>

                       <th scope="col">{{ __('messages.balance') }}</th>                  
      
                     </tr>
                  </thead>
                  <tbody>
           
        
        @foreach($paye_yearly as $key => $paye_monthly)
          
                     <tr>                   
                      <td>{{ $key+1 }}</td>

                       <td>{{ $months[$paye_monthly->month - 1] }}</td>
                       <td>{{ number_format($paye_monthly->paye_amount,2) }}</td>
                       <td>{{ number_format($paye_monthly->paye_balance,2) }}</td>

                       
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
