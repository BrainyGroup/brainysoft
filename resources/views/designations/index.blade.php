@extends('layouts.master')

@section('title', 'Designation')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if( count($designations) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Designation</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($designations as $designation)

                    <tr>

                      <td>{{ $designation->name }}</td>

                      <td>{{ $designation->description }}</td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Designation defined

        @endif



        </div>
    </div>
</div>
@endsection