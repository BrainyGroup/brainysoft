@extends('layouts.app')



@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.edit').' '.__('messages.role')}}</div>

        <div class="card-body">
            {!! Form::open(['action' => array('Payroll\RoleController@update', $role->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name', $role->name,['placeholder' => __('messages.role name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description', $role->description ,['placeholder' => __('messages.role description'), 'label' => __('messages.description')]) }}

            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br/>
                    @foreach($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                        {{ $value->name }}</label>
                    <br/>
                    @endforeach
                </div>
            </div>

            {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection


