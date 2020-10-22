@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.edit')}} {{__('messages.employee type')}}</div>

        <div class="card-body">

            {!! Form::open(['action' => array('Payroll\EmploymentTypeController@update', $employment_type->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name',$employment_type->name,['placeholder' => __('messages.designation name'), 'label' => __('messages.name')]) }}         

            {{ Form::bsText('description',$employment_type->description,['placeholder' => __('messages.designation name'), 'label' => __('messages.name')]) }}
            
            {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!} 
                      
        </div>
    </div>
</div>    
@endsection
