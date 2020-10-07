@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Add Deduction types</div>

        <div class="card-body">
            {!! Form::open(['action' => 'Payroll\DeductionTypeController@store','method' => 'POST']) !!}

            {{ Form::bsText('name','',['placeholder' => 'Enter Deduction name']) }}

            {{ Form::bsText('description','',['placeholder' => 'Enter Deduction description']) }}

            {{ Form::bsSubmit( __('messages.add'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection







