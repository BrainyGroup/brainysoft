@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.edit').' '.__('messages.employee_payment')}}</div>

        <div class="card-body">
            {!! Form::open(['action' => array('Payroll\EmployeePaymentController@update', $employee_payment->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name', $employee_payment->name,['placeholder' => __('messages.enter name')]) }}

            {{ Form::bsText('description', $employee_payment->description ,['placeholder' => __('messages.enter description')]) }}

            {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection


