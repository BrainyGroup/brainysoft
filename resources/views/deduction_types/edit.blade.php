@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit Deduction types</div>

        <div class="card-body">
          	{!! Form::open(['action' => array('Payroll\DeductionTypeController@update', $deduction_type->id),'method' => 'PUT']) !!}

	        {{ Form::bsText('name', $deduction_type->name,['placeholder' => __('messages.deduction name'), 'label' => __('messages.name')]) }}

	        {{ Form::bsText('description', $deduction_type->description,['placeholder' => __('messages.deduction name'), 'label' => __('messages.name')]) }}

	        {{ Form::bsSubmit( __('messages.save'),['class' => 'btn btn-primary']) }}

	        {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection

