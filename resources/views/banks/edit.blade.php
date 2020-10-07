@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.edit').' '.__('messages.role')}}</div>

        <div class="card-body">
            {!! Form::open(['action' => array('Payroll\BankController@update', $role->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name', $role->name,['placeholder' => __('messages.enter name')]) }}

            {{ Form::bsText('description', $role->description ,['placeholder' => __('messages.enter description')]) }}

            {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection


