@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.deparment') }} <span class="pull-right"> <a href="/departments/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

@if(count ($departments) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
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
        @foreach($departments as $department)

                    <tr>

                      <td>{{ $department->name }}</td>

                      <td>{{ $department->description }}</td>

                      <td><a href="/departments/{{$department->id}}/edit">Edit</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this department?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$department->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['DepartmentController@destroy',$department->id],'method' => 'DELETE','id' => $department->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Department defined

          <a class="pull-right" href="/departments/create">{{ __('messages.add')}}</a>


        @endif



        </div>
    </div>
</div>    
@endsection


