@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">


          

        <span class="pull-right"><h1><strong>Payroll Summary for {{$max_pay . '        '}}</strong></h1></span></div>

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

                           <td><a href="/reports/pay_details?max_pay={{$max_pay}}">Details</a></td>
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



