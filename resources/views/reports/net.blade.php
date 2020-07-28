@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">


          

        <span><h1>Net pay for {{ $company->name}}</h1></div>

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

                      <th scope="col">Bank</th>

                      <th scope="col">Account#</th>

                      <th scope="col"><span class = "pull-right">Amount</span></th>
                      

                    </tr>
                  </thead>
                  <tbody>
        @if(count($nets)>0)

        @foreach($nets as $key => $net)

                    <tr>
                    <td>{{ $key+1}}</td>

                      <td>{{ $net->title.'. '.$net->firstname.' '.$net->middlename.' '.$net->lastname }}</td>          

                    <td>{{ $net->bank_name}}</td>

                    <td>{{$net->account_number}}</td>

                      <td><span class = "pull-right">{{ number_format($net->net,2) }}</span></td>           
                    </tr>
          @endforeach
          <tr>
            <td></td>
            <td colspan="3">Total</td>
          <td><span class = "pull-right">{{ number_format($net_total,2)}}</span></td>

          </tr>

          <tr>

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




