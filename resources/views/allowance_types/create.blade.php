@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('messages.add') }} {{ __('messages.allowance type') }}</div>
                <div class="card-body">

                    {!! Form::open(['action' => 'Payroll\AllowanceTypeController@store','method' => 'POST']) !!}

                    {{ Form::bsText( __('messages.name') ,'',['placeholder' => __('messages.allowance type name')]) }}                  

                    {{ Form::bsText(__('messages.description'),'',['placeholder' =>  __('messages.allowance type description')]) }}
                   
                    {{ Form::bsSubmit(__('messages.submit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




                   

