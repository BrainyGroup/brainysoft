@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.add').' Payment for '. $max_pay . ' for ' . $statutory_name}}</div>

        <div class="card-body">
            {!! Form::open(['action' => 'Payroll\StatutoryPaymentController@store','method' => 'POST']) !!}

            {{ Form::bsHidden('statutory_id', $statutory_id) }}

            {{ Form::bsHidden('pay_number', $max_pay) }}


            {{ Form::bsText('balance',$statutory_balance,['placeholder' => __('messages.enter name')]) }}

            {{ Form::bsText('paid',$statutory_balance,['placeholder' => __('messages.enter description')]) }}

            {{ Form::bsSubmit(__('messages.add'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection



 