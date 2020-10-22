@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
    <div class="card-header">{{ __('messages.edit')}} {{ __('messages.allowance type')}}</div>

        <div class="card-body">

            {!! Form::open(['action' => array('Payroll\AllowanceTypeController@update', $allowance_type->id),'method' => 'PUT']) !!}

            {{ Form::bsText( 'name',$allowance_type->name,['placeholder' => __('messages.allowance type name'), 'label' => __('messages.name')]) }}         

            {{ Form::bsText( 'description',$allowance_type->description,['placeholder' => __('messages.allowance type description'), 'label' => __('messages.description')]) }}
            
            {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!} 
                      
        </div>
    </div>
</div>    
@endsection
