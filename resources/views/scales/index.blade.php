@extends('layouts.master')

@section('title', 'Designation')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count ($scales) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Designation</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th class="text-right" scope="col">Minimum</th>
                      <th class="text-right" scope="col">Maximum</th>
                      <th scope="col">Salary circle</th>


                    </tr>
                  </thead>
                  <tbody>
        @foreach($scales as $scale)

                    <tr>

                      <td>{{ $scale->name }}</td>

                      <td>{{ $scale->description }}</td>

                      <td class="text-right"> {{ number_format($scale->minimum, 2) }} </td>

                      <td class="text-right"> {{ number_format($scale->maximum, 2) }} </td>

                      <td>{{ ucfirst($scale->schedule) }}</td>




                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Salary scale defined

        @endif



        </div>
    </div>
</div>
@endsection
