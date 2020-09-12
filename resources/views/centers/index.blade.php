@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.center') }} <span class="pull-right"> <a href="/centers/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
             @if( count($centers) > 0 )
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
                  <caption></caption>

                  <thead>
                    <tr>
                      <th scope="col">{{ __('messages.number') }}</th>
                      <th scope="col">{{ __('messages.name') }}</th>
                      <th scope="col">{{ __('messages.description') }}</th>

                      <th scope="col">{{ __('messages.edit') }}</th>
                      <th scope="col">{{ __('messages.delete') }}</th>

                    </tr>
                  </thead>
                  <tbody>

        @foreach($centers as $center)

                    <tr>

                      <td> <a href="/centers/{{$center->id}}">{{ $center->number }}</a> </td>

                      <td><a href="/centers/{{$center->id}}">{{ $center->name }}</a></td>

                      <td><a href="/centers/{{$center->id}}">{{ $center->description}}</a></td>

                      <td><a href="/centers/{{$center->id}}/edit">{{ __('messages.edit') }}</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.center')}}');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$center->id}}).submit();
                            }">{{ __('messages.delete') }}
                          </a>

                          {!! Form::open(['action' => ['CenterController@destroy',$center->id],'method' => 'DELETE','id' => $center->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No center defined

          <a class="pull-right" href="/centers/create">{{ __('messages.add')}}</a>


        @endif

        </div>
    </div>
</div>    
@endsection



       
