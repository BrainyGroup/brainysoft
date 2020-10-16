@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.add').' '.__('messages.bank')}}</div>

        <div class="card-body">
            {!! Form::open(['action' => 'Payroll\BankController@store','method' => 'POST']) !!}


            {{ Form::bsText( __('messages.name'),'',['placeholder' => __('messages.bank name')]) }}

            {{ Form::bsText( __('messages.description'),'',['placeholder' => __('messages.bank description')]) }}

            {{ Form::bsSubmit(__('messages.submit'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection



 