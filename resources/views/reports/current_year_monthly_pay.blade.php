@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">


          

        <span class="pull-right">Payroll Summary for {{$max_pay . '        '}}<a  href="/pays/create">{{ __('messages.add')}}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

           


        @if(count($pays) > 0)
                  <div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered">
                        <caption></span></caption>

                      <thead>
                        <tr>

                          <th scope="col">Name</th>

                          <th scope="col">Amount</th>

                          <th scope="col">Details</th>

                        </tr>
                      </thead>
                      <tbody>

                         <tr>
                          <td>Total</td>

                          <td>{{ number_format($total,2) }}</td>

                           <td></td>
                     </tr>


                        <tr>

                          <td>Gross</td>
                          <td>{{ number_format($month_gross,2) }}</td>
                          <td></td>

                        </tr>
                        <tr>


                          <td>Paye</td>
                          <td>{{ number_format($month_paye,2) }}</td>
                          <td><a href="/reports/paye?max_pay={{$max_pay}}">Details</a></td>

                        </tr>

                        <tr>
                          <td>Deduction</td>
                          <td>{{ number_format($deduction_sum,2) }}</td>
                          <td></td>
                        </tr>

                        


                        <tr>
                          <td><a href="/reports/net?max_pay={{$max_pay}}">Net</a></td>

                          <td>{{ number_format($month_net,2). ' ' }}</td>
                          <td><a href="/reports/net_by_bank?max_pay={{$max_pay}}">Net by bank</a></td>
                     </tr>

                        
                @foreach($statutories as $statutory)
                        <tr>
                          <td>{{ $statutory->statutory_name }}</td>

                          <td>{{ number_format($statutory->total_amount,2) }}</td>
                          <td><a href="/reports/statutory_list?max_pay={{$max_pay}}&statutory_id={{$statutory->statutory_id}}">Details</a></td>

                     </tr>
                @endforeach

                @if($isPosted)
                 <tr>
                          <td>Already posted</td>

                          <td></td>
                          <td></td>
                     </tr>

                @else

                 <tr>
                          <td>Do you want to post?</td>

                          <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to post pays for this month?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$max_pay}}).submit();
                            }">Yes
                          </a>

                          {!! Form::open(['action' => ['PayController@post',$max_pay],'method' => 'PUT','id' => $max_pay]) !!}

                          {!! Form::close() !!}
                      </td>

                     </tr>

                @endif



            </tbody>
          </table>
      </div>

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




