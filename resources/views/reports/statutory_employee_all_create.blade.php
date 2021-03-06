@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.select statutory') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                
            @endif
                {!! Form::open(['action' => 'Payroll\ReportController@statutory_employee_all','method' => 'GET']) !!}



                    <div class="form-group">

                        <label for="Year" class="control-label">{{ __('messages.statutory') }}</label>
    
                         <select class="form-control" id="statutory" name="statutory" required >
    
    
    
                           <option value="">{{ __('messages.select statutory') }}</option>
    
                          @foreach($statutories as $statutory)
    
                           <option value="{{ $statutory->id }}">{{ $statutory->name }}</option>
    
                           @endforeach
    
                         </select>
    
                        </div>

                    


                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection




