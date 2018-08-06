@extends('layouts.master')

@section('title', 'Department List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count ($departments) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Departments</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($departments as $department)

                    <tr>

                      <td>{{ $department->name }}</td>

                      <td>{{ $department->description }}</td>



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
