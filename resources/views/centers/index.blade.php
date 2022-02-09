@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.center') }} <span class="pull-right">
          @can('center-create')  
          <a href="/centers/create">{{ __('messages.add') }}</a>
          @endcan
        </span></div>

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

                      <td>
                        @can('center-edit') 
                        <a href="/centers/{{$center->id}}/edit"><i class="fa fa-paint-brush text-secondary" aria-hidden="true"></i></a></td>
                        @endcan
                      <td>
                        @can('center-delete') 
                        <a href=""
                          onclick="
                          var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.center')}}');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$center->id}}).submit();
                            }"><i class="fa fa-trash text-secondary" aria-hidden="true"></i>
                          </a>

                          {!! Form::open(['action' => ['Payroll\CenterController@destroy',$center->id],'method' => 'DELETE','id' => $center->id]) !!}
                        @endcan
                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No center defined
          @can('center-create') 

          <a class="pull-right" href="/centers/create">{{ __('messages.add')}}</a>

          @endcan


        @endif

        </div>
    </div>
</div>    
@endsection



       
