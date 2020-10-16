@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.edit').' '.__('messages.bank')}}</div>

        <div class="card-body">
            {!! Form::open(['action' => array('Payroll\BankController@update', $bank->id),'method' => 'PUT']) !!}

            {{ Form::bsText( __('messages.name'), $bank->name,['placeholder' => __('messages.bank name')]) }}

            {{ Form::bsText( __('messages.description'), $bank->description ,['placeholder' => __('messages.bank description')]) }}

            {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection


