@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.add')}} {{__('messages.pay')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

                  {!! Form::open(['action' => 'Payroll\PayController@store','method' => 'POST']) !!}

                    <div class="form-group">

                    <label for="Year" class="control-label">{{__('messages.year')}}</label>

                     <select class="form-control" id="year" name="year" required >

                     {{  define("YEAR", date("Y") ) }}
                     {{  define("MONTH", date("n") ) }}


                       <option value="{{ date("Y") }}">{{ date("Y") }}</option>             

                       
                       

                       @for($i = YEAR - 1; $i>=YEAR -3; $i--)

                      

                       <option value="{{  $i }}">{{  $i }}</option>

                       @endfor

                     </select>

                    </div>

                    <div class="form-group">

                    <label for="month" class="control-label">{{__('messages.month')}}</label>

                     <select class="form-control" id="month" name="month" required >

                            <?php $months = array(
                                'January', 
                                'February', 
                                'March', 
                                'April', 
                                'May', 
                                'June', 
                                'July', 
                                'August', 
                                'September', 
                                'October', 
                                'November', 
                                'December'
                              ); ?>        

                       <option value="{{ MONTH }}">{{ $months[MONTH - 1]}}</option>

                       
                       @for($i = 1 ; $i<=12; $i++)

                       <option value="{{ $i }}">{{ $months[$i - 1 ] }}</option>

                       @endfor

                     </select>

                    </div>

                    
                    <div class="form-group">

                        <label for="net_pay" class="control-label">{{__('messages.net paid')}}</label>
    
                         <select class="form-control" id="net_pay" name="net_pay" required >
    
                           <option value="1">Yes</option>

                           <option value="0">No</option>  
  
                         </select>
    
                        </div>
    


                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection




