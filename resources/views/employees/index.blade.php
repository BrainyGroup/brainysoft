@extends('layouts.master')

@section('header')



@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if($employees)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>All Employee</h1></caption>

                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Id</th>
                      <th scope="col">Designation</th>
                      <th scope="col">Mobile</th>
                      <th scope="col">Allowance</th>
                      <th scope="col">Statutory</th>
                      <th scope="col">Deduction</th>
                      <th scope="col">Details</th>
                    </tr>
                  </thead>
                  <tbody>
        @foreach($employees as $employee)
                    <tr>
                      <th scope="row">{{ $employee->user_id }}</th>

                      <td>{{ $employee->title.'. '.$employee->firstname.' '.$employee->middlename.' '.$employee->lastname }}</td>

                      <td>{{ $employee->identity }}</td>

                      <td>{{ $employee->designation }}</td>

                        <td>{{ $employee->mobile }}</td>

                      <td>Add</td>

                    <td>Add</td>

                    <td>Add</td>

                    <td>Add</td>






                    </tr>

          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Employee

        @endif



        </div>
    </div>
</div>
@endsection
