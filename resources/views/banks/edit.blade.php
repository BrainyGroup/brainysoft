@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.edit').' '.__('messages.bank')}}</div>

        <div class="card-body">
            {!! Form::open(['action' => array('BankController@update', $bank->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name', $bank->name,['placeholder' => __('messages.enter name')]) }}

            {{ Form::bsText('description', $bank->description ,['placeholder' => __('messages.enter description')]) }}

            {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection


