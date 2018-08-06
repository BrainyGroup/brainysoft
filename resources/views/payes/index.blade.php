@extends('layouts.master')

@section('title', 'Paye')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count ($payes) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Paye for </h1></caption>

                  <thead>
                    <tr>

                      <th class = "text-right" scope="col">Minimum</th>
                      <th class = "text-right" scope="col">Maximum</th>
                      <th class = "text-right" scope="col">Ratio</th>
                      <th class = "text-right" scope="col">Offset</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($payes as $paye)

                    <tr>

                      <td class = "text-right">{{ number_format($paye->minimum, 2) }}</td>

                      <td class = "text-right">{{ number_format($paye->maximum, 2) }}</td>

                      <td class = "text-right">{{ $paye->ratio }}</td>

                      <td class = "text-right">{{ number_format($paye->offset, 2) }}</td>



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
