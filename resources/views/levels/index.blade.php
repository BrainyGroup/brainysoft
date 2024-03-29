@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.level') }}<span class="pull-right"> 
          @can('level-create')
          <a class="btn btn-secondary btn-sm" href="/levels/create">{{ __('messages.add') }}</a>
        @endcan
        </span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

 @if(count ($levels) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
                    <caption></caption>

                  <thead>
                    <tr>

                      <th scope="col">{{ __('messages.name') }}</th>
                      <th scope="col">{{ __('messages.description') }}</th>
                      <th scope="col">{{ __('messages.edit') }}</th>
                      <th scope="col">{{ __('messages.delete') }}</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($levels as $level)

                    <tr>

                      <td>{{ $level->name }}</td>

                      <td>{{ $level->description }}</td>

                      <td>
                        @can('level-edit')
                        <a href="/levels/{{$level->id}}/edit">{{ __('messages.edit') }}</a>
                        @endcan
                      
                      </td>

                      <td>
                        @can('level-delete')
                        <a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this level?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$level->id}}).submit();
                            }">{{ __('messages.delete') }}
                          </a>

                          {!! Form::open(['action' => ['Payroll\LevelController@destroy',$level->id],'method' => 'DELETE','id' => $level->id]) !!}

                          {!! Form::close() !!}
                          @endcan
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          {{ __('messages.no level defined')}}  

          @can('level-create')

          <a class="pull-right" class="btn btn-secondary btn-sm" href="/levels/create">{{ __('messages.add')}}</a>
@endcan

        @endif

        </div>
    </div>
</div>    
@endsection




