@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">


     

        <span><h1><strong>Payroll  for {{ $user->title.'. '.$user->firstname.' '.$user->middlename.' '.$user->lastname }}</strong></h1></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

           


        @if(count($pays) > 0)

        <div class="scrollme">
                  

      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm " id="sample_1">
                    <caption></caption>

                  <thead>
                    <tr>

                       <th scope="col">#</th>


                    

                      <th scope="col">Run Date</th>

                      <th scope="col">Pay number</th>

                      <th scope="col">Year</th>

                      <th scope="col">Month</th>



                      <th scope="col">Basic Salary</th>

                      <th scope="col">Allowances</th>

                      <th scope="col">Gloss</th>



                      <th scope="col">Taxable Pay</th>



                      <th scope="col">paye</th>

                      <th scope="col">Monthly Earn</th>



                      <th scope="col">Deductions</th>

                      <th scope="col">Net Earning</th>

                      <th scope="col">Paid</th>

                      <th scope="col">Balance</th>

                      <th scope="col">Print</th>






                    </tr>
                  </thead>
                  <tbody>

                    
        @foreach($pays as $key => $pay)

                    <tr>
                      <td>{{ $key + 1 }}</td>

                    

                      <td>{{ $pay->run_date }}</td>

                      <td>{{ $pay->pay_number }}</td>

                      <td>{{ $pay->year }}</td>

                      <td>{{ $pay->month }}</td>

                      <td>{{  number_format($pay->basic_salary) }}</td>

                      <td>{{  number_format($pay->allowance,2) }}</td>

                      <td>{{ number_format($pay->gloss,2) }}</td>

                      <td>{{  number_format($pay->taxable,2) }}</td>

                      <td>{{  number_format($pay->paye,2) }}</td>

                      <td>{{  number_format($pay->monthly_earning,2) }}</td>

                      <td>{{  number_format($pay->deduction,2) }}</td>

                      <td>{{  number_format($pay->net,2) }}</td>

                      <td>{{  number_format($pay->net - $pay->net_balance,2) }}</td>

                      <td>{{  number_format($pay->net_balance,2) }}</td>


                      <td><a href="{{action('PayController@downloadPDF', $pay->id)}}">PDF</a></td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>
        </div>

        @else

          No Earning, run pay now

         


        @endif

        </div>
    </div>
</div>    
@endsection