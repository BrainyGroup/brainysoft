@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.edit').' '.__('messages.statutury_payment')}}</div>

        <div class="card-body">
            {!! Form::open(['action' => array('Payroll\StatutoryPaymentController@update', $statutury_payment->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name', $statutury_payment->name,['placeholder' =>__('messages.balance'), 'label' => __('messages.balance')]) }}

            {{ Form::bsText('description', $statutury_payment->description ,['placeholder' => __('messages.paid'), 'label' => __('messages.paid')]) }}

            {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection


