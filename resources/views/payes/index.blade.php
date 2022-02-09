@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.paye') }}<span class="pull-right">
          @can('paye-create') 
          <a class="btn btn-secondary btn-sm" href="/payes/create">{{ __('messages.add') }}</a>
        @endcan
        </span></div>

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

                      <th scope="col">{{ __('messages.minimum') }}</th>
                      <th scope="col">{{ __('messages.maximum') }}</th>
                      <th scope="col">{{ __('messages.ratio') }}</th>
                      <th scope="col">{{ __('messages.offset') }}</th>
                      <th scope="col">{{ __('messages.edit') }}</th>
                      <th scope="col">{{ __('messages.delete') }}</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($payes as $paye)

                    <tr>

                      <td class = "text-right">{{ number_format($paye->minimum, 2) }}</td>

                      <td class = "text-right">{{ number_format($paye->maximum, 2) }}</td>

                      <td class = "text-right">{{ $paye->ratio }}</td>

                      <td class = "text-right">{{ number_format($paye->offset, 2) }}</td>

                      <td>
                        @can('paye-edit') 
                          <a href="/payes/{{$paye->id}}/edit">{{ __('messages.edit') }}</a></td>
                        @endcan
                      <td>
                        @can('paye-delete') 
                        <a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this paye?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$paye->id}}).submit();
                            }">{{ __('messages.delete') }}
                          </a>

                          {!! Form::open(['action' => ['Payroll\PayeController@destroy',$paye->id],'method' => 'DELETE','id' => $paye->id]) !!}

                          {!! Form::close() !!}
                        @endcan
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

        {{ __('messages.no paye defined')}} 

        @can('paye-create') 

          <a class="pull-right" class="btn btn-secondary btn-sm" href="/payes/create">{{ __('messages.add')}}</a>
@endcan

        @endif

        </div>
    </div>
</div>    
@endsection


