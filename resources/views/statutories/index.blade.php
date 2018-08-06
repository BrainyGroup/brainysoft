@extends('layouts.master')

@section('title', 'Statutories')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count ($statutories) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Statutories</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>

                      <th scope="col">Description</th>

                      <th scope="col">Organization</th>

                      <th scope="col">Employee</th>

                      <th scope="col">Employer</th>

                      <th scope="col">Due date</th>

                      <th scope="col">Statutory type</th>

                      <th scope="col">Salary base</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($statutories as $statutory)

                    <tr>

                      <td>{{ $statutory->name }}</td>

                      <td>{{ $statutory->description }}</td>

                      <td>{{ $statutory->organization_name }}</td>

                      <td>{{ $statutory->employee }}</td>

                      <td>{{ $statutory->employer }}</td>

                      <td>{{ $statutory->date_required }}</td>

                      <td>{{ $statutory->statutory_type_name }}</td>

                      <td>{{ $statutory->salary_base }}</td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Statutories defined

        @endif



        </div>
    </div>
</div>
@endsection
