@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
    <div class="card-header"><h2>{{ __('messages.pay for') }} {{ $year }}</h2></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        @if( count($year_pays) > 0 )
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm" id="sample_1">
                  <caption></caption>

                  <thead>
                    <tr>                                    
                      <th scope="col">{{ __('messages.pay#') }}#</th>
                     
                      <th scope="col">{{ __('messages.salary') }}</th>
                      <th scope="col">{{ __('messages.allowance') }}</th>
                      <th scope="col">{{ __('messages.gloss') }}</th>
                      <th scope="col">{{ __('messages.taxable') }}</th>
                      <th scope="col">{{ __('messages.paye') }}</th>
                      <th scope="col">{{ __('messages.earning') }}</th>
                      <th scope="col">{{ __('messages.deduction') }}</th>
                      <th scope="col">{{ __('messages.net') }}</th>

                      

                      @foreach($statutory_names as $collection) 

                              
                            
                            <th scope="col">{{  $collection->statutory_name }}</th>
                                       

                  
                     @endforeach
                        
                    </tr>
                  </thead>
                  <tbody>

                 
        @foreach($year_pays as $year_pay)

                   

                    <tr>                 
                                          

                      <td>{{ $year_pay->pay_number }}</td> 
                      
                 

                 

                      <td>{{ number_format($year_pay->basic_salary,2) }}</td>

                      <td>{{ number_format($year_pay->allowance,2) }}</td>

                      <td>{{ number_format($year_pay->gloss,2) }}</td>

                      <td>{{ number_format($year_pay->taxable,2) }}</td>

                      <td>{{ number_format($year_pay->paye,2) }}</td>

                      <td>{{ number_format($year_pay->monthly_earning,2) }}</td>

                      <td>{{ number_format($year_pay->deduction,2) }}</td>

                      <td>{{ number_format($year_pay->net,2) }}</td> 

 
                    
                      @foreach($statutories as $key => $collection) 

                      

                            @if($year_pay->pay_number == $collection->pay_number )

                                                      
                            
                                  <td>{{  $collection->total_amount }}</td> 

                       
                            @endif   
                            
                            

                  
                     @endforeach
                        
                  

                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

         {{ __('messages.no earning run pay now')}} 

          <a class="pull-right" class="btn btn-secondary btn-sm" href="/employees/create">{{ __('messages.add')}}</a>


        @endif


        </div>
    </div>
</div>    
@endsection
