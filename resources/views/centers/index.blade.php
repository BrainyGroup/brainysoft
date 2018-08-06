@extends('layouts.master')

@section('title', 'Center List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if($centers)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Centers</h1></caption>

                  <thead>
                    <tr>
                      <th scope="col">Number</th>
                      <th scope="col">Name</th>
                      <th scope="col">Description</th>                     

                    </tr>
                  </thead>
                  <tbody>

        @foreach($centers as $center)

                    <tr>

                      <td>{{ $center->number }}</td>

                      <td>{{ $center->name }}</td>

                      <td>{{ $center->description}}</td>

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
