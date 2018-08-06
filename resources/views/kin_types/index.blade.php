@extends('layouts.master')

@section('title', 'Kin_types')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count ($kin_types) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Kin_types</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($kin_types as $kin_type)

                    <tr>

                      <td>{{ $kin_type->name }}</td>

                      <td>{{ $kin_type->description }}</td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Kin types defined

        @endif



        </div>
    </div>
</div>
@endsection
