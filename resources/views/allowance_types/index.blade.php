@extends('layouts.master')

@section('title', 'Allowance types')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 col-sm-6">


        @if(count($allowance_types) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Allowance types</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>



                    </tr>
                  </thead>
                  <tbody>
        @foreach($allowance_types as $allowance_type)

                    <tr>


                      <td>{{ $allowance_type->name }}</td>

                    <td>{{  $allowance_type->description }}</td>

                    <td><a href="/allowance_types/{{$allowance_type->id}}/edit">Edit</a></td>

                    <td><a href=""
                        onclick="
                        var result = confirm('Are you sure yo want to delete this allowance type?');
                        if (result){
                            event.preventDefault();
                            document.getElementById({{$allowance_type->id}}).submit();
                          }">Delete
                        </a>

                        {!! Form::open(['action' => ['Allowance_typeController@destroy',$allowance_type->id],'method' => 'DELETE','id' => $allowance_type->id]) !!}

                        {!! Form::close() !!}
                    </td>

                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Allowance types defined

        @endif



        </div>
    </div>
</div>
@endsection
