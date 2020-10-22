@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.edit').' '.__('messages.role')}}</div>

        <div class="card-body">
            {!! Form::open(['action' => array('Payroll\RoleController@update', $role->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name', $role->name,['placeholder' => __('messages.role name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description', $role->description ,['placeholder' => __('messages.role description'), 'label' => __('messages.description')]) }}

            {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection


