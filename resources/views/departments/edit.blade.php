@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit Department</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => array('Payroll\DepartmentController@update', $department->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name', $department->name,['placeholder' => 'Enter Deduction name']) }}

            {{ Form::bsText('description', $department->description,['placeholder' => 'Enter Deduction description']) }}

            {{ Form::bsSubmit( __('messages.edit'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection