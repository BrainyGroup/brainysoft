@extends('layouts.master')

@section('title', 'Deduction Types List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if($deduction_types)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Deduction Types</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">description</th>


                    </tr>
                  </thead>
                  <tbody>
        @foreach($deduction_types as $deduction_type)

                    <tr>



                      <td>{{ $deduction_type->name }}</td>

                      <td>{{ $deduction_type->description }}</td>

                      <td><a href="/deduction_types/{{$deduction_type->id}}/edit">Edit</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this deduction type?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$deduction_type->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['Deduction_typeController@destroy',$deduction_type->id],'method' => 'DELETE','id' => $deduction_type->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Deduction type defined

        @endif



        </div>
    </div>
</div>
@endsection
