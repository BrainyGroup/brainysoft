@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.edit')}} {{__('messages.department')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => array('Payroll\DepartmentController@update', $department->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name', $department->name,['placeholder' => __('messages.department name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description', $department->description,['placeholder' => __('messages.department description'), 'label' => __('messages.description')]) }}

            {{ Form::bsSubmit( __('messages.save'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection