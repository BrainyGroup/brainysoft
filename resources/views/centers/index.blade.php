@extends('layouts.master')

@section('title', 'Center List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if($centers)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Centers</h1><h3 class="pull-right"><a href="/centers/create">Add new</a></h3></caption>

                  <thead>
                    <tr>
                      <th scope="col">Number</th>
                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody>

        @foreach($centers as $center)

                    <tr>

                      <td>{{ $center->number }}</td>

                      <td>{{ $center->name }}</td>

                      <td>{{ $center->description}}</td>

                      <td><a href="/centers/{{$center->id}}/edit">Edit</a></td>

                      <td><a href=""
                    			onclick="
                    			var result = confirm('Are you sure yo want to delete this center?');
                    			if (result){
                    					event.preventDefault();
                    					document.getElementById({{$center->id}}).submit();
                            }">Delete
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

        @endif



        </div>
    </div>
</div>
@endsection
