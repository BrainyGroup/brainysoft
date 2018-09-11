@extends('layouts.master')

@section('title', 'Level')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count ($levels) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                    <caption><h1>{{ __('messages.level') }}</h1> <span class="pull-right"> <a href="/level/create">{{ __('messages.add') }}</span></caption>

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
