@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit employment type</div>

        <div class="card-body">

            {!! Form::open(['action' => array('EmploymentTypeController@update', $employment_type->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name',$employment_type->name,['placeholder' => __('messages.enter name')]) }}         

            {{ Form::bsText('description',$employment_type->description,['placeholder' => __('messages.enter description')]) }}
            
            {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!} 
                      
        </div>
    </div>
</div>    
@endsection