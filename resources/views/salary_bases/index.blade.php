@extends('layouts.master')

@section('title', 'Salary types')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count ($salary_bases) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Salary types</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($salary_bases as $salary_base)

                    <tr>

                      <td>{{ $salary_base->name }}</td>

                      <td>{{ $salary_base->description }}</td>

                      <td><a href="/salary_bases/{{$salary_base->id}}/edit">Edit</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this salary base?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$salary_base->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['Salary_baseController@destroy',$salary_base->id],'method' => 'DELETE','id' => $salary_base->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Salary type defined

        @endif



        </div>
    </div>
</div>
@endsection
