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

                    </tr>
                  </thead>
                  <tbody>
        @foreach($statutory_types as $statutory_type)

                    <tr>

                      <td>{{ $statutory_type->name }}</td>

                      <td>{{ $statutory_type->description }}</td>



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
