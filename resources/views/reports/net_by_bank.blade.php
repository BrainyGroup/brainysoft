@extends('layouts.app')
 @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
           
         <span class="pull-right"><h1>Net pay by bank </h1></div>
         <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
       <div class="table-responsive">
               <table class="table table-hover table-striped table-bordered">
                    <caption></caption>
                   <thead>
                    <tr>
                      <th scope="col">#</th>
                     
                       <th scope="col">Bank</th>                    
                       <th scope="col">Amount</th>
                       <th scope="col"></th>
                     </tr>
                  </thead>
                  <tbody>
        @if(count($net_by_banks)>0)
         @foreach($net_by_banks as $key => $net)
                     <tr>

                      <td>{{ $key + 1 }}</td>                      
                      
                       <td>{{ $net->bank_name }}</td>
                      
                       <td>{{ number_format($net->bank_amount,2) }}</td>
                        <td><a href="/reports/net_list_by_bank?max_pay={{$max_pay}}&bank_id={{$net->bank_id}}">Bank list</a></td>                
                     </tr>
           @endforeach
           <tr>
             <td><a href="">PDF</a></td>
             <td><a href="">PDF</a></td>
             <td><a href="">PDF</a></td>
             <td><a href="">PDF</a></td>

            
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