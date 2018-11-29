@extends('layouts.app')
 @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
           
         <span class="pull-right"><h1>Net pay for {{ $bank_name }} </h1></div>
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
                       <th scope="col">Name</th>
                       <th scope="col">Account#</th>
                       <th scope="col">Amount</th>
                     </tr>
                  </thead>
                  <tbody>
        @if(count($net_list_by_banks)>0)
         @foreach($net_list_by_banks as $key => $net)
                     <tr>
                      <td>{{ $key + 1}}</td>
                       <td>{{ $net->title.'. '.$net->firstname.' '.$net->middlename.' '.$net->lastname }}</td>                   
                       <td>{{ $net->account_number }}</td>
                       <td>{{ number_format($net->net,2) }}</td>                
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
