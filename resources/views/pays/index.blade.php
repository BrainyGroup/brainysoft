@extends('layouts.master')

@section('title', 'Pay')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count ($pays) )> 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Pay</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>

                      <th scope="col">Run Date</th>

                      <th scope="col">Year</th>

                      <th scope="col">month</th>

                      <th scope="col">Basic Salary</th>

                      <th scope="col">Allowances</th>

                      <th scope="col">SSF</th>

                      <th scope="col">Taxable Pay</th>

                      <th scope="col">$paye</th>

                      <th scope="col">Net</th>

                      <th scope="col">HI</th>

                      <th scope="col">WCF</th>

                      <th scope="col">SDL</th>

                      <th scope="col">Deductions</th>

                      <th scope="col">Net Earning</th>

                      <th scope="col">Details</th>


                    </tr>
                  </thead>
                  <tbody>
        @foreach($$pays as $pay)

                    <tr>

                      <td>{{ $pay->name }}</td>

                      <td>{{ $pay->run_date }}</td>

                      <td>{{ $pay->year }}</td>

                      <td>{{ $pay->month }}</td>

                      <td>{{ $pay->name }}</td>

                      <td>{{ $pay->description }}</td>

                      <td>{{ $pay->name }}</td>

                      <td>{{ $pay->description }}</td>

                      <td>{{ $pay->name }}</td>

                      <td>{{ $pay->description }}</td>

                      <td>{{ $pay->name }}</td>

                      <td>{{ $pay->description }}</td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Earning, run pay now

        @endif



        </div>
    </div>
</div>
@endsection
