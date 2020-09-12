@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.add').' '.__('messages.bank')}}</div>

        <div class="card-body">
            {!! Form::open(['action' => 'EmployeePaymentController@store','method' => 'POST']) !!}

            {{ Form::bsHidden('employee_id', $employee_id) }}

            {{ Form::bsHidden('pay_number', $pay_number) }}


            {{ Form::bsText('balance',$employee_balance,['placeholder' => __('messages.enter name')]) }}

            {{ Form::bsText('paid',$employee_balance,['placeholder' => __('messages.enter description')]) }}

            {{ Form::bsSubmit(__('messages.add'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection



 