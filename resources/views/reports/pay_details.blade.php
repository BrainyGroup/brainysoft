@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">     

        <span><h1><strong>{{ __('messages.payroll for') }} {{$max_pay . '        '}}</strong></h1></span></div>

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

                      <th scope="col">{{ __('messages.name') }}</th>

                      <th scope="col">{{ __('messages.run date') }}</th>

                      <th scope="col">{{ __('messages.pay#') }}</th>

                      <th scope="col">{{ __('messages.basic salary') }}</th>

                      <th scope="col">{{ __('messages.allowances') }}</th>

                      <th scope="col">{{ __('messages.gloss') }}</th>

                      <th scope="col">{{ __('messages.taxable pay') }}</th>

                      <th scope="col">{{ __('messages.paye') }}</th>

                      <th scope="col">{{ __('messages.earning') }}</th>

                      <th scope="col">{{ __('messages.deduction') }}</th>

                      <th scope="col">{{ __('messages.net') }}</th>

                      <th scope="col">{{ __('messages.print') }}</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($pays as $key => $pay)

                    <tr>
                      <td>{{ $key + 1 }}</td>

                      <td>{{ $pay->title.'. '.$pay->firstname.' '.$pay->middlename.' '.$pay->lastname }}</td>

                      <td>{{ $pay->run_date }}</td>



                      <td>{{ $pay->pay_number }}</td>

                      <td>{{  number_format($pay->basic_salary) }}</td>

                      <td>{{  number_format($pay->allowance,2) }}</td>

                      <td>{{ number_format($pay->gloss,2) }}</td>

                      <td>{{  number_format($pay->taxable,2) }}</td>

                      <td>{{  number_format($pay->paye,2) }}</td>

                      <td>{{  number_format($pay->monthly_earning,2) }}</td>

                      <td>{{  number_format($pay->deduction,2) }}</td>

                      <td>{{  number_format($pay->net,2) }}</td>

                      <td><a href="{{action('Payroll\PayController@downloadPDF', $pay->id)}}">PDF</a></td>

                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>
        </div>

        @else

        {{ __('messages.no earning run pay now')}}          


        @endif

        </div>
    </div>
</div>    
@endsection




