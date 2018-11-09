@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">


          

        <span class="pull-right">Net pay for </div>

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

                      <th scope="col">Name</th>

                      <th scope="col">Bank</th>

                      <th scope="col">Account#</th>

                      <th scope="col">Amount</th>


                    </tr>
                  </thead>
                  <tbody>
        @if(count($nets)>0)

        @foreach($nets as $net)

                    <tr>

                      <td>{{ $net->title.'. '.$net->firstname.' '.$net->middlename.' '.$net->lastname }}</td>                  



                    

                      


                      <td></td>

                      <td></td>

                      <td>{{ number_format($net->net,2) }}</td>                



                    </tr>


          @endforeach

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




