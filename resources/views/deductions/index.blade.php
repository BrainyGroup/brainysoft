@extends('layouts.master')

@section('title', 'Employee List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count($employees_deductions)>0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Total Deductions</h1></caption>

                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Deduction name</th>
                      <th scope="col">Amount</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($employees_deductions as $deduction)


                    <tr>

                      <th scope="row">{{ $deduction->user_id }}</th>

                      <td><a href="/deductions/create?employee_id={{$deduction->employee_id}}">{{ $deduction->title.'. '.$deduction->firstname.' '.$deduction->middlename.' '.$deduction->lastname }}</a></td>

                      <td>{{ $deduction->deduction_name }}  </td>

                      <td class = "text-right">{{ $deduction->deduction_amount }}  </td>


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
