@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit Deduction types</div>

        <div class="card-body">
          	{!! Form::open(['action' => array('Payroll\DeductionTypeController@update', $deduction_type->id),'method' => 'PUT']) !!}

	        {{ Form::bsText('name', $deduction_type->name,['placeholder' => 'Enter Deduction name']) }}

	        {{ Form::bsText('description', $deduction_type->description,['placeholder' => 'Enter Deduction description']) }}

	        {{ Form::bsSubmit( __('messages.edit'),['class' => 'btn btn-primary']) }}

	        {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection

