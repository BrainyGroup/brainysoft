@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.add').' '.__('messages.bank')}}</div>

        <div class="card-body">
            {!! Form::open(['action' => 'Payroll\BankController@store','method' => 'POST']) !!}


            {{ Form::bsText( 'name','',['placeholder' => __('messages.bank name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText( 'description','',['placeholder' => __('messages.bank description'), 'label' => __('messages.description')]) }}

            {{ Form::bsSubmit(__('messages.submit'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection



 