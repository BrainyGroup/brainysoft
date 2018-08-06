@extends('layouts.master')

@section('title', 'Countries List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if($countries)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>All Countries</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>


                    </tr>
                  </thead>
                  <tbody>
        @foreach($countries as $country)

                    <tr>

                      <td>{{ $country->name }}</td>

                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Country defined

        @endif



        </div>
    </div>
</div>
@endsection
