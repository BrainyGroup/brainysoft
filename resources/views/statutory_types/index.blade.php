@extends('layouts.master')

@section('title', 'Statutory types')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count ($statutory_types) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Statutory types</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>

                      <th scope="col">Edit</th>
                      <th scope="col">Description</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($statutory_types as $statutory_type)

                    <tr>

                      <td>{{ $statutory_type->name }}</td>

                      <td>{{ $statutory_type->description }}</td>

                      <td><a href="/statutory_types/{{$statutory_type->id}}/edit">Edit</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this statutory_type?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$statutory_type->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['Statutory_typeController@destroy',$statutory_type->id],'method' => 'DELETE','id' => $statutory_type->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Department defined

        @endif



        </div>
    </div>
</div>
@endsection
