@extends('layouts.master')

@section('title', 'Employee List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count($employees_allowances)>0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Allowances</h1></caption>

                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Employee Name</th>
                      <th scope="col">Allowance name</th>
                      <th scope="col">Amount</th>


                    </tr>
                  </thead>
                  <tbody>
        @foreach($employees_allowances as $allowance)

                    <tr>

                      <th scope="row">{{ $allowance->employee_id }}</th>

                      <td><a href="/allowances/create?user_id={{$allowance->user_id}}">{{ $allowance->title.'. '.$allowance->firstname.' '.$allowance->middlename.' '.$allowance->lastname }}</a></td>

                      <td>{{ $allowance->allowance_name }}  </td>

                      <td class = "text-right">{{ $allowance->allowance_amount }}  </td>

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
