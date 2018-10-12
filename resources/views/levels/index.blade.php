@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.level') }}<span class="pull-right"> <a href="/levels/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

 @if(count ($levels) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                    <caption></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($levels as $level)

                    <tr>

                      <td>{{ $level->name }}</td>

                      <td>{{ $level->description }}</td>

                      <td><a href="/levels/{{$level->id}}/edit">Edit</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this level?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$level->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['LevelController@destroy',$level->id],'method' => 'DELETE','id' => $level->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Levels defined

          <a class="pull-right" href="/levels/create">{{ __('messages.add')}}</a>


        @endif

        </div>
    </div>
</div>    
@endsection




