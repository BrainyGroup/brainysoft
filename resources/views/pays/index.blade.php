@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">

          <div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered">
                        <caption></span></caption>

                      <thead>
                        <tr>

                          <th scope="col">Gross</th>

                          <th scope="col">Net</th>

                          <th scope="col">Paye</th>


                          <th scope="col">SDL</th>






                        </tr>
                      </thead>
                      <tbody>


                        <tr>


                          <td>{{ number_format($month_gross,2) }}</td>



                          <td>{{ number_format($month_paye,2) }}</td>

                          <td>{{ number_format($month_net,2) }}</td>




                          <td><a href="#">PDF</a></td>



                        </tr>




            </tbody>
          </table>
      </div>

          

        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


        @if(count($pays) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                    <caption></caption>

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

                      <th scope="col">Print</th>






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


                      <td><a href="{{action('PayController@downloadPDF', $pay->id)}}">PDF</a></td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Earning, run pay now

          <a class="pull-right" href="/pays/create">{{ __('messages.add')}}</a>


        @endif

        </div>
    </div>
</div>    
@endsection




