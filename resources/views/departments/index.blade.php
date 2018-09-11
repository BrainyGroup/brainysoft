@extends('layouts.master')

@section('title', 'Department List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count ($departments) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                    <caption><h1>{{ __('messages.deparment') }}</h1> <span class="pull-right"> <a href="/departments/create">{{ __('messages.add') }}</span></caption>

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
