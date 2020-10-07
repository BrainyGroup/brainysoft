@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.paye') }}<span class="pull-right"> <a href="/payes/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        @if(count ($payes) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
                    <caption></caption>

                  <thead>
                    <tr>

                      <th class = "text-right" scope="col">Minimum</th>
                      <th class = "text-right" scope="col">Maximum</th>
                      <th class = "text-right" scope="col">Ratio</th>
                      <th class = "text-right" scope="col">Offset</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($payes as $paye)

                    <tr>

                      <td class = "text-right">{{ number_format($paye->minimum, 2) }}</td>

                      <td class = "text-right">{{ number_format($paye->maximum, 2) }}</td>

                      <td class = "text-right">{{ $paye->ratio }}</td>

                      <td class = "text-right">{{ number_format($paye->offset, 2) }}</td>

                      <td><a href="/payes/{{$paye->id}}/edit">Edit</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this paye?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$paye->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['Payroll\PayeController@destroy',$paye->id],'method' => 'DELETE','id' => $paye->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Department defined

          <a class="pull-right" href="/payes/create">{{ __('messages.add')}}</a>


        @endif

        </div>
    </div>
</div>    
@endsection


