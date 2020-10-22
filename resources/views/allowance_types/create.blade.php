@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('messages.add') }} {{ __('messages.allowance type') }}</div>
                <div class="card-body">

                    {!! Form::open(['action' => 'Payroll\AllowanceTypeController@store','method' => 'POST']) !!}

                    {{ Form::bsText( 'name' ,'',['placeholder' => __('messages.allowance type name'), 'label' => __('messages.name')]) }}                  

                    {{ Form::bsText('description','',['placeholder' =>  __('messages.allowance type description'), 'label' => __('messages.description')]) }}
                   
                    {{ Form::bsSubmit('messages.submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




                   

