@extends('layouts.master')

@section('title', 'Pay')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count($pays) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Pay</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>

                      <th scope="col">Run Date</th>

                      <th scope="col">Pay number</th>



                      <th scope="col">Basic Salary</th>

                      <th scope="col">Allowances</th>

                      <th scope="col">Gloss</th>



                      <th scope="col">Taxable Pay</th>



                      <th scope="col">paye</th>

                      <th scope="col">Monthly Earn</th>



                      <th scope="col">Deductions</th>

                      <th scope="col">Net Earning</th>




                    </tr>
                  </thead>
                  <tbody>
        @foreach($pays as $pay)

                    <tr>

                      <td>{{ $pay->title.'. '.$pay->firstname.' '.$pay->middlename.' '.$pay->lastname }}</td>

                      <td>{{ $pay->run_date }}</td>



                      <td>{{ $pay->pay_number }}</td>

                      <td>{{ $pay->basic_salary }}</td>

                      <td>{{ $pay->allowance }}</td>

                      <td>{{ $pay->gloss }}</td>

                      <td>{{ $pay->taxable }}</td>

                      <td>{{ $pay->paye }}</td>

                      <td>{{ $pay->monthly_earning }}</td>

                      <td>{{ $pay->deduction }}</td>

                      <td>{{ $pay->net }}</td>



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
