@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
    <div class="card-header">{{__('messages.add')}} {{__('messages.deduction types')}}</div>

        <div class="card-body">
            {!! Form::open(['action' => 'Payroll\DeductionTypeController@store','method' => 'POST']) !!}

            {{ Form::bsText('name','',['placeholder' => __('messages.deduction type name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description','',['placeholder' => __('messages.deduction type description'), 'label' => __('messages.description')]) }}

            {{ Form::bsSubmit( __('messages.add'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection







